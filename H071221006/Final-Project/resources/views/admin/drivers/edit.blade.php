@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    Form Edit Data
                </div>
                <div class="card-body">
                    <form action="{{ route('drivers.update', $driver->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nama_mobil">Nama Driver</label>
                            <input type="text" name="nama_driver" class="form-control" value="{{ old('nama_driver') }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option {{ $driver->gender === "Pria" ? 'selected' : null }} value="pria">Pria</option>
                                <option {{ $driver->gender === "Wanita" ? 'selected' : null }} value="wanita">wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usia">Usia</label>
                            <input type="text" name="usia" class="form-control" value="{{ old('usia') }}">
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
                        <!-- Hidden input for gambar_sim -->
                        <input type="hidden" name="gambar_sim" value="{{ $driver->gambar_sim }}">
                        <!-- Hidden input for gambar_driver -->
                        <input type="hidden" name="gambar_driver" value="{{ $driver->gambar_driver }}">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Form Edit Gambar
                </div>
                <div class="card-body">
                    <form action="{{ route('drivers.updateImage', $driver->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <img src="{{ Storage::url($driver->gambar_driver) }}" class="image-fluid" alt="">
                        </div>
                        <div class="form-group">
                            <label for="gambar_driver">Gambar Driver</label>
                            <input type="file" class="form-control" name="gambar_driver">
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url($driver->gambar_sim) }}" class="img-fluid" alt="">
                        </div>
                        <div class="form-group">
                            <label for="gambar_sim">Gambar SIM</label>
                            <input type="file" class="form-control" name="gambar_sim">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
