<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rental Mobil</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />
  </head>
  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container px-4 px-lg-5 d-flex justify-content-between align-items-center">
          <a class="navbar-brand ininav" href="{{ route('homepage')}}">Croix<span>Car</span></a> 
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto mb-lg-0 d-flex justify-content-center">
                  <li class="nav-item"><a class="nav-link active" href="{{ route('homepage') }}">Home</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Car</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Driver</a></li> --}}
                  <li class="nav-item"><a class="nav-link" href="{{ route('payment') }}">Payments</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">User Profile</a></li> --}}
              </ul>
              <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                  <li class="nav-item active">
                    <a class="nav-link" onclick="document.getElementById('logout-form').submit()" href="#">
                    <i class="fas fa-logout fa-fw"></i>
                            <span>Logout</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  
    <!-- Header-->
    @yield('content')
    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
          Minhajul Yusri Khairi
        </p>
        <p class="m-0 text-center text-white">
          For more info about me -<br>
          please click on the link below!
        </p>
        <div class="social text-center">
          <a href="https://www.instagram.com/minhajulkhairi_" target="_blank"><i class="fab fa-instagram">@minhajulkhairi_</i></a>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
  </body>
</html>
