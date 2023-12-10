@extends('layouts.main')

<style>

</style>

@section('container')
    <h1 class="mt-2 mb-2">Hasil Pencarian Produk</h1>
    @foreach ($products as $product)
        <ul>
            <li>
                <a href="{{ route('show', $product->productName) }}"
                            style="color: #4F6F52">{{ $product->productName }}</a>
            </li>
        </ul>
    @endforeach
    <button class="btn search mb-4"><a href="/product" style="text-decoration: none; color: black;">Back to products</a>
    </button>
@endsection
