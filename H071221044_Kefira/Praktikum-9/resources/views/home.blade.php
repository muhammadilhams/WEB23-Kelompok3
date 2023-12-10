@extends('layouts.main')
<style>
    .hero__heading {
        font-size: 36px;
        /* Ukuran teks */
        color: #333;
        /* Warna teks */
        text-align: center;
        /* Posisi teks tengah */
        animation: blink 1s infinite;
        /* Animasi berkedip */
    }

    @keyframes blink {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }
    }

</style>
@section('container')
    <center>
        <div class="hero__content h-75 container-custom position-relative">
            <div class="d-flex h-100 align-items-center hero__content-width">
                <div>
                    <h1 class="hero__heading fw-bold" style="font-size: 50px; color: #222831;">KAZE</h1>
                    <p class="lead fw-bold" style="color: #222831; font-size: bold">Pretty little things inside. It'll blessed your eyes.</p>
                    <a href="/product" class="mt-2 btn btn-dark" role="button"><span></span>Go To Product</a>
                </div>
            </div>
        </div>
    </center>
@endsection
