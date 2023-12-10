<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#fed8b5">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Bibliophile's Haven</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="true">
                Kategori
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('book.category', ['kategori' => 'self improvement']) }}">Self Improvement</a></li>
                <li><a class="dropdown-item" href="{{ route('book.category', ['kategori' => 'novels']) }}">Novel</a></li>
            </ul>
        </div>

        <div>
            <div class="collapse navbar-collapse nav-item" style="margin-right: 270px">
                <form class="d-flex">
                    <input class="form-control me-2 text-center " type="search" placeholder="Cari Buku"
                        aria-label="Search" style="width: 500px"></input>
                    <button class="bi bi-search" type="submit" style="border-radius: 20px ; width:30px"></button>
                </form>
            </div>
        </div>

        <div>
            <div class="collapse navbar-collapse" id="navbarNav" style="margin-right: 20px">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link bi bi-bag-plus-fill" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/masuk">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
