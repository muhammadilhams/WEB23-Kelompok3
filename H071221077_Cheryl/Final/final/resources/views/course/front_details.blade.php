@extends('layout/front_base')

@section('title', $course->name)

@if(session('success'))
@section('alert-success-content')
{{ session('success')['message'] }}
@endsection
@endif

@if(session('error'))
@section('alert-error-content')
{{ session('error')['message'] }}
@endsection
@endif

@section('content')
<main class="w-full flex max-h-[calc(100vh_-_70px)] overflow-hidden">
  <div class="flex flex-col gap-y-10 w-full max-w-2xl px-8 py-6 border-r border-slate-300 border-solid">
    <div class="flex items-center w-full justify-between">
      <h2 class="font-medium text-2xl">{{ $course->name }}</h2>
      <form method="POST" action="{{ route('course.enroll', [ 'id' => $course->id ]) }}">
        @csrf
        @if($enrolled)
        <div class="text-center px-3 py-2 rounded-md bg-green-100 text-green-700">Enrolled</div>
        @else
        <button type="submit" class="disabled:bg-slate-500 disabled:cursor-not-allowed text-center px-3 py-2 rounded-md bg-slate-700 hover:bg-slate-800 active:bg-slate-900 text-white cursor-pointer">Enroll Course</button>
        @endif
      </form>
    </div>
    <div class="w-full flex flex-col space-y-6">
      @if($enrolled)
      <div class="flex flex-row items-center space-x-4">
        <p class="w-40">Progress</p>
        <p>:</p>
        <p class="w-96 font-medium">{{ auth()->user()->courses()->find($course->id)->pivot->progress }} / {{ count($course->contents) }}</p>
      </div>
      @endif
      <div class="flex flex-row items-center space-x-4">
        <p class="w-40">Course Name</p>
        <p>:</p>
        <p class="w-96 font-medium">{{ $course->name }}</p>
      </div>
      <div class="flex flex-row items-center space-x-4">
        <p class="w-40">Course Lecturer</p>
        <p>:</p>
        <p class="w-96 font-medium">{{ $course->lecturer->name }} (<a class="text-blue-700 cursor-pointer" href="mailto:{{ $course->lecturer->email }}">Mail</a>)</p>
      </div>
      <div class="flex flex-row items-center space-x-4">
        <p class="w-40">Course Schedule</p>
        <p>:</p>
        <p class="w-96 font-medium">{{ $course->start_date->format('d F Y') }} -> {{ $course->end_date->format('d F Y') }}</p>
      </div>
      <div class="flex flex-row space-x-4">
        <p class="w-40">Course Description</p>
        <p>:</p>
        <p class="w-96">{{ $course->description }}</p>
      </div>
    </div>
  </div>
  <div class="flex flex-col gap-y-10 w-full overflow-y-scroll px-8 py-6 min-h-[calc(100vh_-_66px)]">
    <div class="flex flex-col w-full gap-y-10">
      <h2 class="font-medium text-2xl">Course Content</h2>
      <div class="w-full flex flex-col items-center gap-y-6">
        @foreach($course->contents as $i => $content)
        <div class="border rounded-md w-full flex justify-between items-center p-6">
          <div class="w-full flex flex-col gap-y-4">
            <h3 class="text-xl font-medium">{{ $content->name }}</h3>
            <p>{{ $content->description }}</p>
          </div>
          @if($enrolled)
          <div class="w-full flex items-center justify-end gap-x-8">
            @if($content->filename)
            <a target="_blank" class="hover:bg-slate-100 rounded-md p-2" href="{{ route('file.show_pdf', ['filename' => $content->filename ]) }}">
              <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z" />
              </svg>
            </a>
            @endif
            @if($content->users()->find(auth()->user()->id)->pivot->status)
            <div class="min-w-[7rem] text-center text-green-700 bg-green-100 px-3 py-2 rounded-md">Selesai</div>
            @else
            <form class="w-fit" action="{{ route('course.finish_content', [ 'id' => $course->id ]) }}" method="POST">
              @csrf
              <input name="content_id" value="{{ $content->id }}" class="h-0" type="hidden">
              <button class="min-w-[7rem] text-center px-3 py-2 rounded-md bg-slate-700 hover:bg-slate-800 active:bg-slate-900 text-white cursor-pointer">Selesaikan</button>
            </form>
            @endif
          </div>
          @endif
        </div>
        @endforeach
      </div>
    </div>
  </div>
</main>
@endsection