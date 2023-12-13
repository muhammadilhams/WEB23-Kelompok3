@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Produk</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text"><strong>Harga:</strong> {{ $product->price }}</p>
                <p class="card-text"><strong>Stok:</strong> {{ $product->stock }}</p>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                @endif
            </div>
        </div>
    </div>
@endsection
