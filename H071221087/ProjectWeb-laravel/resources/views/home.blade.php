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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide mt-3">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/diskon.jpg" class="d-block w-100" alt="gambar">
                    </div>
                    <div class="carousel-item">
                        <img src="images/diskon2.jpg" class="d-block w-100" alt="gambar">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" style="color:black"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>


<section>
    <section id="BESTSELLERS">
        <div class="row justify-content-center mx-3 py-3 gx-md-5 ">
            @foreach($bookNovel as $buku)
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
