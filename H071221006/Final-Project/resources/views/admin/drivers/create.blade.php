@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Form Tambah Data
        </div>
        <div class="card-body">
            <form action="{{ route('drivers.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_mobil">Nama Driver</label>
                    <input type="text" name="nama_driver" class="form-control" value="{{ old('nama_driver') }}">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="usia">Usia</label>
                    <input type="text" name="usia" class="form-control" value="{{ old('usia') }}">
                </div>
                <div class="form-group">
                    <label for="gambar_sim">Gambar SIM</label>
                    <input type="file" class="form-control" name="gambar_sim">
                </div>
                <div class="form-group">
                    <label for="gambar_driver">Gambar Driver</label>
                    <input type="file" class="form-control" name="gambar_driver">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak_tersedia">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection