@extends('layouts.main') <!-- Meng-extend layout dari file 'layouts.main', yang berisi struktur umum halaman web -->

<style>
    /* Gaya CSS untuk animasi warna teks */
    .title-word {
        animation: color-animation 4s linear infinite;
    }

    /* Definisi warna untuk animasi teks */
    .title-word-1 {
        --color-1: #DF8453;
        --color-2: #3D8DAE;
        --color-3: #E4A9A8;
    }

    .title-word-2 {
        --color-1: #DBAD4A;
        --color-2: #ACCFCB;
        --color-3: #17494D;
    }

    .title-word-3 {
        --color-1: #ACCFCB;
        --color-2: #E4A9A8;
        --color-3: #ACCFCB;
    }

    .title-word-4 {
        --color-1: #3D8DAE;
        --color-2: #DF8453;
        --color-3: #E4A9A8;
    }

    /* Animasi warna teks menggunakan keyframes */
    @keyframes color-animation {
        0% {
            color: var(--color-1)
        }

        32% {
            color: var(--color-1)
        }

        33% {
            color: var(--color-2)
        }

        65% {
            color: var(--color-2)
        }

        66% {
            color: var(--color-3)
        }

        99% {
            color: var(--color-3)
        }

        100% {
            color: var(--color-1)
        }
    }

    /* Gaya visual untuk elemen judul */
    .title {
        text-align: center;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        font-size: 50px;
        text-transform: uppercase;
    }
</style>

@section('container')
    <h2 class="title mb-5 mt-5">
        <span class="title-word title-word-1">Selamat</span>
        <span class="title-word title-word-2">Datang</span>
        <span class="title-word title-word-3">di</span>
        <span class="title-word title-word-4">ClassicModels!</span>
    </h2>
    <h5 class="mb-3">Dunia Kendaraan Klasik! ... 
    </h5>
    <h5 class="mb-3">Kami mengundang Anda untuk menjelajahi koleksi kami yang penuh pesona. ... 
    </h5>
    <h5 class="mb-3">Di ClassicModels, kami memahami bahwa kendaraan klasik adalah lebih dari sekadar alat ... 
    </h5>
@endsection

<!-- welcome --> 
