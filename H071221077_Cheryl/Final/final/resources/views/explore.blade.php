@extends('layout/front_base')

@section('title', 'Explore Course')

@section('content')
<main class="w-full flex flex-col gap-y-10 px-8 py-4">
  <form action="{{ route('explore') }}">
    <input class="w-80 px-3 py-2 border border-slate-300 rounded-md hover:border-slate-700 focus:border-slate-700 focus:outline focus:outline-2 focus:outline-slate-300" name="search" value="{{ request()->query('search') }}" placeholder="Search your courses...">
  </form>
  <div class="w-full flex flex-col gap-y-4">
    <h2 class="text-2xl font-medium text-slate-900">Explore Courses</h2>
    <div class="w-full flex flex-wrap gap-6">
      @foreach($courses as $i => $course)
      <div class="border border-slate-300 rounded-md flex flex-col min-h-[22rem] w-96 max-w-xs">
        <div class="w-full bg-slate-400 rounded-t-md h-[11.25rem]"></div>
        <div class="flex flex-col justify-between p-4 h-[10.75rem]">
          <div>
            <h3 class="text-lg text-slate-900 font-medium">{{ $course['name'] }}</h3>
            <p class="text-slate-500 mt-1 mb text-sm">Lecturer: <span class="font-medium">{{ $course->lecturer->name }}</span> (<a class="text-blue-700" href="mailto:{{ $course->lecturer->email }}">Mail</a>)</p>
          </div>
          @if(collect(auth()->user()->courses)->firstWhere('id', $course->id))
          <p class="text-green-700 bg-green-100 rounded-sm px-2 py-0.5 max-w-fit font-medium">Enrolled</p>
          @else
          <a href="{{ route('course.details', [ 'id' => $course->id ]) }}" class="text-center px-3 py-2 rounded-md bg-slate-700 hover:bg-slate-800 active:bg-slate-900 text-white cursor-pointer">View Details</a>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</main>
@endsection