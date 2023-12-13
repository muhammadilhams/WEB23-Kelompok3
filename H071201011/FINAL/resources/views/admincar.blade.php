@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between mb-1">
    <h1 class="h1 text-black-800">Daftar Mobil</h1>
    <div>
        <button type="button" class="btn btn-primary px-2 py-1" data-bs-toggle="modal" data-bs-target="#TambahDPeserta">Tambah Mobil</button>
    </div>
</div>

</div>
<div class="modal fade" id="TambahDPeserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Peserta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('add-car')}}" class="signin-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class=" d-flex mb-3">
                    <div class="form-group col-md-6">
                        <label class="label" for="car_type">Tipe Mobil</label>
                        <input type="text" class="form-control  @error('car_type') is-invalid @enderror" name="car_type" placeholder="Tipe Mobil" required autocomplete="car_type">
                        @error('car_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="label" for="price_per_hour">Price per Hour</label>
                        <input type="number" name="price_per_hour" class="form-control @error('price_per_hour') is-invalid @enderror" placeholder="price per hour" required autocomplete="price_per_hour">
                        @error('price_per_hour')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="label" for="number_license">Number License</label>
                    <input type="text" name="number_license" class="form-control @error('number_license') is-invalid @enderror" placeholder="Number License" required autocomplete="number_license">
                    @error('number_license')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-12">
                    <label class="label" for="bahan_bakar">Bahan Bakar</label>
                    <input type="text" name="bahan_bakar" class="form-control @error('bahan_bakar') is-invalid @enderror" placeholder="Bahan bakar" required autocomplete="bahan_bakar">
                    @error('bahan_bakar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-12">
                    <label class="label" for="keluaran_tahun">Keluaran Tahun</label>
                    <input type="number" name="keluaran_tahun" class="form-control @error('keluaran_tahun') is-invalid @enderror" placeholder="Keluaran Tahun" required autocomplete="keluaran_tahun">
                    @error('keluaran_tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3 col-md-12">
                    <label class="label" for="status">Status</label>
                    <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" placeholder="Status" required autocomplete="status">
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3 col-md-12">
                    <label class="label" for="photo">Foto</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="photo" name="photo" autofocus>
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label class="custom-file-label" for="foto">Pilih Foto...</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<br>
<div class="container-md">
    <div class="table">
        <table class="table table-primary table-striped col-md-12">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Tipe Mobil</th>
                    <th scope="col">Tarif Per Jam</th>
                    <th scope="col">Number License</th>
                    <th scope="col">Bahan Bakar</th>
                    <th scope="col">Keluaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>

                {{$nomor=0}}
                @foreach($carList as $car)
                <tr>
                    <th scope="row">{{$nomor++}}</th>
                    <td><img src="{{asset("/images/$car->foto")}}" alt="foto mahasiswa" class="foto" style=" width: 80px; height: 110px" onerror="this.src='/Image/profile-default.jpg'"></td>
                    <td>{{ $car->car_type}}</td>
                    <td>{{ $car->price_per_hour}}</td>
                    <td>{{ $car->number_license}}</td>
                    <td>{{ $car->bahan_bakar}}</td>
                    <td>{{ $car->keluaran_tahun}}</td>
                    <td>{{ $car->status}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$car->id}}">edit</button>
                        <div class="modal fade" id="exampleModal1{{$car->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit {{$car->number_license}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('edit-car',['id'=>$car->id])}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class=" d-flex mb-3">
                                            <div class="form-group col-md-6">
                                                <label class="label" for="car_type1">Tipe Mobil</label>
                                                <input type="text" class="form-control  @error('car_type1') is-invalid @enderror" name="car_type1" placeholder="Tipe Mobil" required autocomplete="car_type1">
                                                @error('car_type1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="label" for="price_per_hour1">Price per Hour</label>
                                                <input type="number" name="price_per_hour1" class="form-control @error('price_per_hour1') is-invalid @enderror" placeholder="price per hour" required autocomplete="price_per_hour1">
                                                @error('price_per_hour1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="label" for="number_license1">Number License</label>
                                            <input type="text" name="number_license1" class="form-control @error('number_license1') is-invalid @enderror" placeholder="Number License" required autocomplete="number_license1">
                                            @error('number_license1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-md-12">
                                            <label class="label" for="bahan_bakar1">Bahan Bakar</label>
                                            <input type="text" name="bahan_bakar1" class="form-control @error('bahan_bakar1') is-invalid @enderror" placeholder="Bahan bakar" required autocomplete="bahan_bakar1">
                                            @error('bahan_bakar1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-md-12">
                                            <label class="label" for="keluaran_tahun1">Keluaran Tahun</label>
                                            <input type="number" name="keluaran_tahun1" class="form-control @error('keluaran_tahun1') is-invalid @enderror" placeholder="Keluaran Tahun" required autocomplete="keluaran_tahun1">
                                            @error('keluaran_tahun1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 col-md-12">
                                            <label class="label" for="status1">Status</label>
                                            <input type="number" name="status1" class="form-control @error('status1') is-invalid @enderror" placeholder="Status" required autocomplete="status1">
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3 col-md-12">
                                            <label class="label" for="photo1">Foto</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('photo1') is-invalid @enderror" value="{{asset("/Image/$car->photo")}}" id="photo1" name="photo1" autofocus>
                                                @error('photo1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <label class="custom-file-label" for="foto1" id="labelFoto">{{$car->photo}}</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endSection