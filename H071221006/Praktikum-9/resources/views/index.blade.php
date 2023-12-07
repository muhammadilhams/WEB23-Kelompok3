
@extends('layouts.main')

@section('content')
    <div class="container">
        <a href="{{ route('produks.create') }}" class="btn btn-success">Tambah Produk</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Metode</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produks as $produk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->deskripsi }}</td>
                        <td>Rp. {{ $produk->harga }}</td>
                        <td>
                            <a href="{{ route('produks.show', $produk->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('produks.destroy', $produk->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
