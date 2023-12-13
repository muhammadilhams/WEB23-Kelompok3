<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--bootstrap-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- main css-->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" />
    <!-- Font Awesome Solid + Brands -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form method="POST" action="{{ route('register') }}" class="login">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="email" type="email" class="form-control login__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input id="username" type="text" class="form-control login__input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="username" autocomplete="username" autofocus>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        
                        <i class="login__icon fas fa-calendar"></i>
                        <input id="date" type="date" class="form-control login__input @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" required autocomplete="date">

                        @error('tgl_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input id="password" type="password" class="form-control login__input @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input id="password-confirm" type="password" class="form-control login__input" name="password_confirmation" placeholder="password confirmation" required autocomplete="new-password">
                    </div>
                    <button type="submit" class="button login__submit">
                        <span class="button__text">Register</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>

</html>