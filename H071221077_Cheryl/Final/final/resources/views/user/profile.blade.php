@extends('layout/front_base')

@section('title', 'Profile')

@section('content')
<main class="w-full flex flex-col items-center px-8 py-6">
  <div class="w-full max-w-lg flex flex-col items-center gap-y-8">
    <div class="w-full flex items-center justify-between gap-x-12">
      <div class="w-full flex items-center justify-between">
        <p>Nama Lengkap</p>
        <p>:</p>
      </div>
      <p class="shrink-0 w-80 px-3 py-2 border border-slate-300 rounded-md">
        {{ auth()->user()->name }}
      </p>
    </div>
    <div class="w-full flex items-center justify-between gap-x-12">
      <div class="w-full flex items-center justify-between">
        <p>Username</p>
        <p>:</p>
      </div>
      <p class="shrink-0 w-80 px-3 py-2 border border-slate-300 rounded-md">
        {{ auth()->user()->username }}
      </p>
    </div>
    <div class="w-full flex items-center justify-between gap-x-12">
      <div class="w-full flex items-center justify-between">
        <p>Email</p>
        <p>:</p>
      </div>
      <p class="shrink-0 w-80 px-3 py-2 border border-slate-300 rounded-md">
        {{ auth()->user()->email }}
      </p>
    </div>
  </div>
</main>
@endsection