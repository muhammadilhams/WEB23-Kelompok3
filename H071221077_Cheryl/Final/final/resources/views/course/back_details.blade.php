@extends('layout/cms_base')

@section('title', $course->name)

@section('page-title', $course->name)

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

@section('back')
<a href="{{ route('course.index') }}" class="hover:bg-slate-100 rounded-md">
  <svg class="fill-current w-7 h-7 " viewBox="0 0 48 48">
    <path d="M26.95 34.9L17.05 25C16.8833 24.8333 16.7666 24.6667 16.7 24.5C16.6333 24.3333 16.6 24.15 16.6 23.95C16.6 23.75 16.6333 23.5667 16.7 23.4C16.7666 23.2333 16.8833 23.0667 17.05 22.9L27 12.95C27.3 12.65 27.6583 12.5 28.075 12.5C28.4916 12.5 28.85 12.65 29.15 12.95C29.45 13.25 29.5916 13.6167 29.575 14.05C29.5583 14.4833 29.4 14.85 29.1 15.15L20.3 23.95L29.15 32.8C29.45 33.1 29.6 33.45 29.6 33.85C29.6 34.25 29.45 34.6 29.15 34.9C28.85 35.2 28.4833 35.35 28.05 35.35C27.6166 35.35 27.25 35.2 26.95 34.9Z"></path>
  </svg>
</a>
@endsection


@section('content')
<main class="w-full flex flex-col space-y-6 px-8 py-4">
  <div class="w-full flex flex-col space-y-6">
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
      <p class="w-40">Mode</p>
      <p>:</p>
      <p class="font-medium w-fit px-2 rounded-md {{ $course->mode == 'edit' ? 'text-blue-700 bg-blue-100' : 'text-green-700 bg-green-100' }}">{{ $course->mode == 'edit' ? 'Draft' : 'Published' }}</p>
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
  <div class="w-full flex flex-col space-y-8">
    <div class="w-full flex items-center">
      <h3 class="text-2xl font-medium">Content</h3>
      @if($course->mode == 'edit')
      <a href="{{ route('course.create_content_view', [ 'id' => $course->id ]) }}" class="text-center px-3 py-2 rounded-md bg-slate-700 hover:bg-slate-800 active:bg-slate-900 text-white ml-auto">Create Content</a>
      @endif
    </div>
    <table class="border-collapse">
      <thead>
        <tr>
          <th class="border px-2 py-2.5">#</th>
          <th class="border px-2 py-2.5">Title</th>
          <th class="border px-2 py-2.5">Description</th>
          <th class="border px-2 py-2.5">Document</th>
          <th class="border px-2 py-2.5">Handle</th>
        </tr>
      </thead>
      <tbody>
        @if (count($course->contents) == 0)
        <tr>
          <td colspan="6" class="border px-2 py-2.5 align-middle text-center text-slate-500">Data doesn't exist!</td>
        </tr>
        @endif
        @foreach($course->contents as $i => $content)
        <tr>
          <td class="border px-2 py-2.5">{{ ($i + 1) }}</td>
          <td class="border px-2 py-2.5">{{ $content->name }}</td>
          <td class="border px-2 py-2.5">{{ $content->description }}</td>
          <td class="border px-2 py-2.5 align-middle text-center">
            @if($content->filename)
            <a target="_blank" class="text-blue-700" href="{{ route('file.show_pdf', ['filename' => $content->filename ]) }}">Open Content</a>
            @endif
          </td>
          <td class="border px-2 py-2.5">
            <div class="flex justify-center space-x-2 text-black">
              @if($course->mode == 'edit')
              <a href="{{ route('course.update_content_view', [ 'id' => $course->id, 'content_id' => $content->id ]) }}" class="block px-3 py-2 rounded-md border border-slate-400 w-fit hover:cursor-pointer hover:bg-slate-100">Edit</a>
              <button data-modal-target="popup-delete-course-content-{{ $content->id }}" data-modal-toggle="popup-delete-course-content-{{ $content->id }}" class="block px-3 py-2 rounded-md border border-red-400 w-fit hover:cursor-pointer hover:bg-red-100">Delete</button>
              @endif
            </div>
          </td>
          <div id="popup-delete-course-content-{{ $content->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <button type="button" class="absolute top-3 right-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-slate-600 dark:hover:text-white" data-modal-hide="popup-delete-course-content-{{ $content->id }}">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                  <svg class="mx-auto mb-4 text-red-600 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  <h3 class="mb-8 font-normal">Apakah kamu yakin untuk menghapus content dengan judul <span class="font-semibold">{{ $content->name }}</span>?</h3>
                  <form method="POST" action="{{ route('course.delete_content', ['id' => $course->id]) }}">
                    @csrf
                    <input type="hidden" value="{{ $content->id }}" name="id">
                    <button data-modal-hide="popup-delete-course-content-{{ $content->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                      Yes
                    </button>
                  </form>
                  <button data-modal-hide="popup-delete-course-content-{{ $content->id }}" type="button" class="text-center px-3 py-2 rounded-md border border-slate-400 w-fit hover:cursor-pointer hover:bg-slate-100 text-sm">No, Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
@endsection