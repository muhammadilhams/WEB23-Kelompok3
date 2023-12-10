<!-- Meng-extend layout dari file 'layouts.main'. Ini menggantikan placeholder @yield('container') di layout dengan konten dari halaman ini. -->
@extends('layouts.main') 

<!-- Mulai bagian yang akan diisi pada placeholder @yield('container') di file layout -->
@section('container') 
<!-- Memulai loop untuk setiap produk dalam array $products -->
    @foreach ($products as $product) 
    <!-- Membuat artikel dengan margin bawah sebesar 5 unit untuk setiap produk -->
        <article class="mb-5"> 
            <h3 class="mb-3">
                <!-- Judul artikel berisi nama produk sebagai tautan ke halaman detail produk menggunakan route 'products.show' -->
                <h3>Nama Produk : <a href="{{ route('products.show', $product->productName) }}">{{ $product->productName }}</a></h3> 
            </h3>
            <!-- Paragraf yang menampilkan jenis produk (productLine) -->
            <p>ProductLine : {{ $product->productLine }}</p> 
            <p>ProductVendor : {{ $product->productVendor }}</p> 
            <!-- Paragraf yang menampilkan jumlah produk dalam stok (quantityInStock) -->
            <!-- Paragraf yang menampilkan vendor produk (productVendor) -->
            <p>QuantityInStock : {{ $product->quantityInStock }}</p> 
        </article>
        <!-- Selesai loop untuk menampilkan semua produk dalam array $products -->
    <!-- Akhir dari konten yang akan diisi pada placeholder @yield('container') di file layout -->
    @endforeach 

<!-- Menutup bagian konten yang akan diisi pada placeholder @yield('container') di file layout -->
@endsection 


<!-- tampilkan product -->
