
@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Edit Produk</h2>
        <form action="{{ route('produks.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $produk->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('produks.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
