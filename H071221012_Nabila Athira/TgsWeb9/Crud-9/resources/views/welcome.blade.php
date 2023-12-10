@extends('layout.template')

@section('konten')
<div class="jumbotron mt-5">
    <h1 class="display-4" style="color: white;">Welcome to CRUD</h1>
    <p class="lead" style="color: white;">CRUD adalah Operasi antara database dengan Web yang dimana memungkinkan developer untuk melakukan <br> 
    Operasi Create, Data, Update, dan Delete pada data yang telah dibuat lalu ditampilkan ke halaman Web</p>
    <hr class="my-4">
    <p>Lebih lengkapnya mari melihat isinya</p>
    <!-- Tombol navigasi menuju halaman data mahasiswa -->
    <a class="btn btn-dark btn-lg" href="/mahasiswa" role="button">Let's Go</a>
</div>
<center>
    <img src="image/cemangka.jpeg" alt="" width="300" height="200">
</center>
@endsection

