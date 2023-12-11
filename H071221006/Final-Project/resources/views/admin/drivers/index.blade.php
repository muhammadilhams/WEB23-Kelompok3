@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Driver</h3>
            <a href="{{ route('drivers.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"> 
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Driver</th>
                            <th>Gambar Driver</th>
                            <th>Gambar SIM</th>
                            <th>Gender</th>
                            <th>Usia</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($drivers as $driver)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $driver->nama_driver }}</td>
                                <td>
                                    <img src="{{ Storage::url($driver->gambar_driver) }}" width="200">
                                </td>
                                <td>
                                    <img src="{{ Storage::url($driver->gambar_sim) }}" width="200">
                                </td>
                                <td>{{ $driver->gender }}</td>
                                <td>{{ $driver->usia }}</td>
                                <td>
                                    <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form onclick="return confirm('Anda yakin data dihapus');" class="d-inline" action="{{ route('drivers.destroy', $driver->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection