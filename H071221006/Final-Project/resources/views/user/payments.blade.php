@extends('layouts.frontend')

@section('content')
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Formulir Payments</h1>
      </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

    @if(session()->has('message'))
    <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
      {{ session()->get('message') }}    
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

      <div class="row justify-content-center">
        <div class="col-lg-10 m-auto">
          <div class="rental-form">
            <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-6 col-md-6 mb-2">
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Isikan nama lengkap">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-2">
                  <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Isikan alamat email">
                  </div>
                </div>
              </div>
                <div class="col-lg-6 col-md-6 mb-2">
                  <div class="form-group">
                    <label for="bayar">Bukti Pembayaran</label>
                    <input type="file" name="bukti" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 mb-2">
                  <div class="form-group">
                    <label for="sim">Gambar SIM</label>
                    <input type="file" name="gambar_sim" class="form-control">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-2">
                  <div class="form-group">
                    <label for="ktp">Gambar KTP</label>
                    <input type="file" name="gambar_ktp" class="form-control">
                  </div>
                </div>
              <div class="col-lg-6 col-md-6 mb-2">
                <div class="form-group">
                  <label for="nama">Pesan</label>
                  <input type="text" name="pesan" class="form-control" placeholder="Isikan Pesan">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-6 mb-2">
                  <div class="form-group">
                    <label for="subject">Total Payment</label>
                    <input type="text" name="subject" class="form-control" placeholder="Isikan total payment">
                  </div>
                </div>
              </div>
              <div class="input-submit form-group">
                <button type="submit" style="height: 50px; width: 400px; margin: 0 auto" class="d-block btn btn-primary">Bayar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
  
@endsection
