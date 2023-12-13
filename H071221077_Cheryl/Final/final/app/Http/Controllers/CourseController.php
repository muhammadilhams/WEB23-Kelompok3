<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseContentRequest;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = [];

        $courses = Course::withTrashed();

        if (auth()->user()->role == 'teacher') {
            $courses = $courses->where('lecturer_id', '=', auth()->user()->id);
        }

        if ($request->search != "") {
            $keyword = $request->search;

            $courses = $courses->where(function ($query) use ($keyword) {
                foreach (app(Course::class)->getFillable() as $column) {
                    $query->orWhere($column, 'LIKE', '%' . $keyword . '%');
                }
            });
        }

        $courses = $courses->orderBy('updated_at', 'desc')->paginate(10);

        return view('course.index', [
            "courses" => $courses,
        ]);
    }

    public function create_view()
    {
        $teachers = User::where('role', '=', 'teacher')->get();

        return view('course.form', [
            "teachers" => $teachers,
            "editable" => false
        ]);
    }

    public function create(CourseRequest $request)
    {
        $teacher = $request->teacher;

        if (auth()->user()->role == 'teacher') {
            $teacher = auth()->user()->id;
        }

        course::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'lecturer_id' => $teacher,
            'description' => $request->description,
        ]);

        return to_route('course.index');
    }

    public function update_view(string $course_id)
    {
        $teachers = User::where('role', '=', 'teacher')->get();

        $course = Course::withTrashed()->find($course_id);

        if ($course == null) {
            abort(404);
        }

        return view('course.form', [
            'editable' => true,
            'course' => $course,
            "teachers" => $teachers,
        ]);
    }

    public function update(CourseRequest $request)
    {
        $course = Course::find($request->id);

        if ($course != null) {
            $course->name = $request->name;
            $course->start_date = $request->start_date;
            $course->end_date = $request->end_date;
            $course->description = $request->description;
            $course->lecturer_id = $request->teacher;

            $course->save();
        }


        return to_route('course.index');
    }

    public function deactivate(Request $request)
    {
        $course = Course::find($request->id);

        if ($course != null) {
            $course->delete();
        }

        return to_route('course.index');
    }

    public function activate(Request $request)
    {
        $course = Course::withTrashed()->find($request->id);

        if ($course != null) {
            $course->restore();
        }

        return to_route('course.index');
    }

    public function publish(Request $request)
    {
        $course = Course::find($request->id);

        if ($course != null) {
            $course->mode = 'published';
            $course->save();
        }

        return to_route('course.index');
    }

    public function draft(Request $request)
    {
        $course = Course::find($request->id);

        if ($course != null) {
            $course->mode = 'edit';
            $course->save();
        }

        return to_route('course.index');
    }

    public function delete(Request $request)
    {
        $course = Course::find($request->id);

        if (count($course->users) > 0) {
            $student_count = count($course->users);

            return to_route('course.index')->with('error', [
                'message' => 'Course tidak dapat dihapus. Terdapat ' . $student_count . ' yang terhubung dengan course ini!'
            ]);
        }

        $course->contents()->forceDelete();

        $course->forceDelete();

        return to_route('course.index')->with('success', [
            'message' => 'Course telah berhasil dihapus secara permanen!'
        ]);
    }

    public function details(string $id)
    {
        $course = Course::find($id);

        if (collect(['superadmin', 'admin', 'teacher'])->contains(Auth::user()->role))
            return view('course.back_details', [
                'course' => $course
            ]);

        return view('course.front_details', [
            'course' => $course,
            'enrolled' => collect(auth()->user()->courses)->firstWhere('id', $course->id) != null
        ]);
    }

    public function create_content_view(string $id)
    {
        $course = Course::find($id);

        if ($course->mode == 'published') {
            return to_route('course.details', [
                'id' => $course->id
            ])->with('error', [
                'message' => "Course telah dipublikasikan, tidak dapat diedit!"
            ]);
        }

        return view('course.content.form', [
            'editable' => false,
            'course' => $course,
        ]);
    }

    public function create_content(CourseContentRequest $request)
    {
        $course_id = $request->course_id;

        $course = Course::find($course_id);

        $content = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->file) {
            $timestamp = time();
            $file_name = $timestamp . '_' . $request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'local');
            $content['filename'] = $file_name;
        }

        $course->contents()->create($content);

        return to_route('course.details', ['id' => $course->id]);
    }

    public function update_content_view(string $id, string $content_id)
    {
        $course = Course::find($id);

        if ($course  == null) {
            abort(404);
        }

        if ($course->mode == 'published') {
            return to_route('course.details', [
                'id' => $course->id
            ])->with('error', [
                'message' => "Course telah dipublikasikan, tidak dapat diedit!"
            ]);
        }

        $content = $course->contents->find($content_id);

        return view('course.content.form', [
            'editable' => true,
            'course' => $course,
            'content' => $content,
        ]);
    }

    public function update_content(string $id, CourseContentRequest $request)
    {
        $course = Course::find($id);

        if ($course  == null) {
            abort(404);
        }

        $content = $course->contents->find($request->id);

        if ($content) {
            $content->name = $request->name;
            $content->description = $request->description;
            if ($request->file) {
                $timestamp = time();
                $file_name = $timestamp . '_' . $request->file->getClientOriginalName();
                $file_path = $request->file('file')->storeAs('uploads', $file_name, 'local');
                $content->filename = $file_name;
            }
            $content->save();
        }

        return to_route('course.details', ['id' => $course->id]);
    }

    public function delete_content(string $id, Request $request)
    {
        $course = Course::find($id);

        if ($course  == null) {
            abort(404);
        }

        $content_id = $request->id;
        $content = $course->contents()->find($content_id);

        $count_user = count($content->users);
        if ($count_user > 0) {
            return to_route('course.details', ['id' => $course->id])->with('error', [
                'message' => 'Konten tidak dapat dihapus. Terdapat ' . $count_user . ' user yang terhubung dengan konten ini!'
            ]);
        }

        $content->forceDelete();

        return to_route('course.details', ['id' => $course->id])->with('success', [
            'message' => 'Konten telah berhasil dihapus secara permanen!'
        ]);;
    }

    public function enroll(string $id)
    {
        $course = Course::find($id);

        if (collect(auth()->user()->courses)->firstWhere('id', $course->id)) {
            return to_route('course.details', ['id' => $course->id])->with('error', [
                'message' => 'Kamu sudah terdaftar di dalam course'
            ]);
        }

        $course->users()->attach(auth()->user()->id, ['progress' => 0, 'created_at' => now(), 'updated_at' => now()]);

        foreach ($course->contents as $content) {
            $content->users()->attach(auth()->user()->id, [
                'start_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return to_route('course.details', ['id' => $course->id])->with('success', [
            'message' => 'Selamat! Kamu telah terdaftar dalam course!'
        ]);
    }

    public function finish_content(string $id, Request $request)
    {
        $course = Course::find($id);
        $content  = $course->contents()->find($request->content_id);

        $course->users()->updateExistingPivot(auth()->user()->id, [
            'progress' => $course->users()->find(auth()->user()->id)->pivot->progress + 1,
        ]);

        $content->users()->updateExistingPivot(auth()->user()->id, [
            'end_at' => now(),
            'status' => true,
        ]);

        return to_route('course.details', ['id' => $course->id])->with('success', [
            'message' => 'Selamat kamu telah menyelesaikan konten ' . $content->name
        ]);
    }
}
