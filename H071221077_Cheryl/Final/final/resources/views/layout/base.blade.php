<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title') | LearnZe</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="antialiased flex justify-between">
  <aside class="flex flex-col w-80 px-6 py-4 h-screen border border-slate-300">
    <a class="px-3 pb-3 border-b border-slate-300" href="{{ route('dashboard') }}">
      <h1 class="font-medium text-3xl text-slate-950">learnZe</h1>
    </a>
    <div class="flex flex-col space-y-3 py-4">
      @if (collect(['superadmin', 'teacher', 'admin'])->contains(auth()->user()->role))
      <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'bg-slate-200' : '' }} block px-3 py-2 rounded-md w-full hover:bg-slate-200 cursor-pointer">Dashboad</a>
      @endif
      @if (collect(['superadmin', 'admin'])->contains(auth()->user()->role))
      <a href="{{ route('user.index') }}" class="{{ Request::routeIs('user.*') ? 'bg-slate-200' : '' }} block px-3 py-2 rounded-md w-full hover:bg-slate-200 cursor-pointer">User Management</a>
      @endif
      @if (collect(['superadmin', 'teacher', 'admin'])->contains(auth()->user()->role))
      <a href="{{ route('course.index') }}" class="{{ Request::routeIs('course.*') ? 'bg-slate-200' : '' }} block px-3 py-2 rounded-md w-full hover:bg-slate-200 cursor-pointer">Course Management</a>
      @endif
    </div>
  </aside>
  <div class="w-full flex flex-col items-center">
    <header class="flex justify-between items-center px-8 py-3 w-full border-b border-b-slate-300">
      <div class="flex space-x-4 items-center">
        @yield('back')
        <h1 class="font-medium text-2xl text-neutral-950">@yield('page-title')</h1>
      </div>
      <div class="flex space-x-4 items-center">
        <h2 class="text-slate-700">Hello, {{ auth()->user()->name }} ({{ auth()->user()->role }})</h2>
        <a href="{{ route('auth.logout') }}" class="min-w-[6rem] text-center px-3 py-2 rounded-md bg-slate-700 hover:bg-slate-800 active:bg-slate-900 text-white">Logout</a>
      </div>
    </header>
    @yield('content')
  </div>
</body>

</html>