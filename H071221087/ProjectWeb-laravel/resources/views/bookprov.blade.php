@extends('layouts\navbar')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Store</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="py-3">
        <div class="container">
            <h1 class="display-4">Buku Pengembangan Diri Terbaik</h1>
            <p class="lead">
                Temukan buku yang anda butuhkan di sini!
                <br>Buku self improvement yang akan membantu Anda menjadi versi terbaik dari diri Anda.
            </p>
        </div>
    </section>

    <section id="BESTSELLERS">
            <div class="row justify-content-center mx-3 py-3 gx-md-5 ">
                @foreach ($bookNovel as $buku)
                <div class="card col-4 col-md-6 mb-4" style="width: 12rem; height: auto;">
                    <img src="/novel/{{$buku->image}}" class="card-img-top" alt="gambar">
                    <div class="card-body">
                        <h6 class="card-title">{{$buku->name}}</h6>
                        <p class="card-text">
                            <i>Rp.{{$buku->price}}</i>
                        </p>
                        <a href="/detail/{{$buku->id}}" class="btn btn-primary" style="width: 7rem;">View</a>
                    </div>
                </div>
                @endforeach
            </div>
    </section>
    @endsection
</body>
</html>
