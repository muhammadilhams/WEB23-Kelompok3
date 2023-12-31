@extends('layouts.frontend')

@section('content')
<header class="py-5" style="background-color: #272829">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Sewa Mobil</h1>
        <p class="lead fw-normal text-white-50 mb-0">
          hanya dengan satu sentuhan
        </p>
      </div>
    </div>
  </header>
  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h3 class="text-center mb-5" style="color: #3A4D39">Daftar Driver</h3>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($drivers as $driver)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div
                        class="badge badge-custom {{ $driver->status == 'free' ? 'bg-success' : 'bg-danger' }} text-white position-absolute"
                        style="top: 0; right: 0"
                    >
                        {{ $driver->status }}
                    </div>
                    <!-- Product image-->
                    <img
                        class="card-img-top"
                        src="{{ Storage::url($driver->gambar_sim) }}"
                        alt="{{ $driver->nama_driver }}"
                        style="object-fit: contain; height: 15rem;"
                    />
                    <!-- Product details-->
                    <div class="card-body card-body-custom pt-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder" style="color: #3A4D39">{{ $driver->nama_driver }}</h5>
                            <ul class="list-unstyled list-style-group">
                                <li class="border-bottom p-2 d-flex justify-content-between">
                                    <span>Umur</span>
                                    <span style="font-weight: 600">{{ $driver->usia }}</span>
                                </li>
                                <li class="border-bottom p-2 d-flex justify-content-between">
                                    <span>Gender</span>
                                    <span style="font-weight: 600">{{ $driver->gender }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer border-top-0 bg-transparent mb-3">
                        <div class="text-center">
                            <a class="btn mt-auto text-white" style="background-color: #739072"
                                href="{{ route('contact') }}">Sewa</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
  </section>
@endsection
