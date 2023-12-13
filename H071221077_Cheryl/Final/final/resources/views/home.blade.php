@extends('layout/front_base')

@section('title', 'Home')

@section('content')
<main class="w-full flex flex-col gap-y-10 px-8 py-4">
  <div class="w-full flex flex-col gap-y-4">
    <h2 class="text-2xl font-medium text-slate-900">Enrolled Courses</h2>
    <div class="w-full flex flex-wrap gap-6">
      @if(count($enrolled_courses) == 0)
      <div class="text-lg font-medium">Tidak ada course</div>
      @endif
      @foreach($enrolled_courses as $i => $enrolled_course)
      <div class="border border-slate-300 rounded-md flex flex-col min-h-[22rem] w-96 max-w-xs">
        <div class="w-full bg-slate-400 rounded-t-md h-[11.25rem]"></div>
        <div class="flex flex-col justify-between p-4 h-[10.75rem]">
          <div>
            <h3 class="text-lg text-slate-900 font-medium">{{ $enrolled_course['name'] }}</h3>
            <p class="text-slate-500 mt-1 mb text-sm">Lecturer: <span class="font-medium">{{ $enrolled_course->lecturer->name }}</p>
          </div>
          <a href="{{ route('course.details', [ 'id' => $enrolled_course->id ]) }}" class="text-center px-3 py-2 rounded-md bg-slate-700 hover:bg-slate-800 active:bg-slate-900 text-white cursor-pointer">Open Course</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</main>
@endsection