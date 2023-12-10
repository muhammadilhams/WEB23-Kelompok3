<!-- Meng-extend layout dari file 'layouts.main'. Ini menggantikan placeholder @yield('container') di layout dengan konten dari halaman ini. -->
@extends('layouts.main') 

<!-- Mulai bagian yang akan diisi pada placeholder @yield('container') di file layout -->
@section('container') 
<!-- Judul halaman untuk menampilkan informasi produk. Diberi margin atas sebesar 4 unit (mt-4). -->
    <h2 class="mt-4">Informasi Produk</h2> 

    <!-- Paragraf dengan judul "Nama Produk" yang menampilkan nama produk menggunakan variabel $product->productName. Diberi margin atas sebesar 4 unit (mt-4). -->
    <h5 class="mt-4">Nama Produk : {{ $product->productName }}</h5> 

    <!-- Paragraf yang menampilkan jenis produk (productLine) menggunakan variabel $product->productLine. -->
    <p>Jenis Produk : {{ $product->productLine }}</p> 

    <!-- Paragraf yang menampilkan skala produk (productScale) menggunakan variabel $product->productScale. -->
    <p>Skala Produk : {{ $product->productScale }}</p>

    <!-- Paragraf yang menampilkan penjual produk (productVendor) menggunakan variabel $product->productVendor. -->
    <p>Penjual Produk : {{ $product->productVendor }}</p> 

    <!-- Paragraf yang menampilkan deskripsi produk (productDescription) menggunakan variabel $product->productDescription. -->
    <p>Deskripsi : {{ $product->productDescription }}</p> 

    <!-- Paragraf yang menampilkan jumlah produk dalam stok (quantityInStock) menggunakan variabel $product->quantityInStock. -->
    <p>Stok Barang : {{ $product->quantityInStock }}</p> 

    <!-- Paragraf yang menampilkan harga beli produk (buyPrice) menggunakan variabel $product->buyPrice. -->
    <p>Harga Beli : {{ $product->buyPrice }}</p> 

    <!-- Paragraf yang menampilkan harga eceran tertinggi produk (MSRP) menggunakan variabel $product->MSRP. -->
    <p>Harga Eceran Tertinggi : {{ $product->MSRP }}</p> 

    <!-- Tautan kembali ke halaman produk dengan tombol berwarna biru (#007BFF). -->
    <a href="/product" class="btn btn-primary">Back to products</a> 
<!-- Menutup bagian konten yang akan diisi pada placeholder @yield('container') di file layout -->
@endsection 


<!-- tampilkan informasi per produk -->