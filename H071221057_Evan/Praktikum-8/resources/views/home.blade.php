@extends('layouts.main')
<style>
.hero__heading {
  opacity: 0;
  animation: slideIn 4s linear infinite; /* Animasikan dengan nama slideIn */
}

@keyframes slideIn {
  0% {
    opacity: 0;
    transform: translateX(-100%);
  }
  25% {
    opacity: 1;
    transform: translateX(0);
  }
  75% {
    opacity: 1;
    transform: translateX(0);
  }
  100% {
    opacity: 0;
    transform: translateX(100%);
  }
}
</style>
@section('container')
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" loading="lazy" class="hero__video">
        <source src="video/nadinku.MP4" type="video/mp4">
    </video>
    <center>
        <div class="hero__content h-100 container-custom position-relative">
            <div class="d-flex h-100 align-items-center hero__content-width">
                <div class="text-white">
                    <h1 class="hero__heading fw-bold" style="font-size: 50px">Rumah Sorai</h1>
                    <p class="lead mb-4 fw-bold" style="color: #fff; font-size: bold">Berangkat dari diskusi panjang, Sorai Riang Dinamika resmi terlahir di tahun 2018. Terlahir 
                    sebagai salah satu label perusahaan musik, Sorai Riang Dinamika bertujuan menjadi wadah 
                    pengembangan industri musik beserta musisi di Tanah Air.</p>
                    <a href="/product" class="mt-2 btn btn__main" role="button"
                        style="background-color: #000000"><span></span>Go To Product</a>
                </div>
            </div>
        </div>
    </center>
@endsection
