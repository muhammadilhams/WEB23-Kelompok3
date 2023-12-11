<!-- Meng-extend layout dari file 'layouts.main'. Ini menggantikan placeholder @yield('container') di layout dengan konten dari halaman ini. -->
@extends('layouts.main') 

<!-- Mulai bagian yang akan diisi pada placeholder @yield('container') di file layout -->
@section('container') 
<!-- Judul halaman untuk menampilkan hasil pencarian produk -->
    <h1>Hasil Pencarian Produk</h1> 
    
    <!-- Memulai daftar tak terurut (unordered list) untuk menampilkan hasil pencarian produk -->
    <ul> 

        <!-- Melakukan loop pada array $products, yang berisi hasil pencarian produk -->
        @foreach ($products as $product) 
        <!-- Setiap produk akan ditampilkan sebagai item daftar dengan nama produk -->
            <li>{{ $product->productName }}</li> 
            <!-- Selesai loop untuk menampilkan semua produk yang ditemukan -->
        @endforeach 
        <!-- Menutup daftar tak terurut -->
    </ul> 

    <!-- Tautan kembali ke beranda dengan tombol berwarna biru (#007BFF) -->
    <a href="/" class="btn btn-primary">Back to home</a> 
    <!-- Menutup bagian konten yang akan diisi pada placeholder @yield('container') di file layout -->
@endsection 




<!-- tampilkan data produk yang disearch dengan perulangan -->
