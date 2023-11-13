
@extends('layouts.main')

@section('content')
    <style>
        .card {
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }
    </style>

    <div class="container">
        <h2 class="mb-4">Detail Produk</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $produk->nama }}</h5>
                <p class="card-text"><strong>Deskripsi:</strong> {{ $produk->deskripsi }}</p>
                <p class="card-text"><strong>Harga:</strong> {{ $produk->harga }}</p>
                <a href="{{ route('produks.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
