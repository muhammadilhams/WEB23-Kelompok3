<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $enrolled_courses = Auth::user()->courses;

        return view('home', [
            'enrolled_courses' => $enrolled_courses,
        ]);
    }

    public function explore(Request $request)
    {
        $courses = Course::where('mode', '!=', 'edit');

        if ($request->search != "") {
            $keyword = $request->search;
            $courses = $courses->where('name', 'LIKE', '%' . $keyword . '%');
        }

        $courses = $courses->get();

        return view('explore', [
            'courses' => $courses
        ]);
    }
}
