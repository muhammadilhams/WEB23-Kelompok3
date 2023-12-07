@extends('layouts.main')
<style>
.hero__heading {
  opacity: 0;
  animation: slideIn 4s linear infinite; /* Animasikan dengan nama slideIn */
}

.hero__video {
    position: absolute;
    top: 50%;
    left: 50%;
    width:100%;
    height:auto;
    transform: translateX(-50%) translateY(-50%);
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
        <source src="videos/nadinku.MP4" type="video/mp4">
    </video>
    <center>
        <div class="hero__content h-75 container-custom position-relative">
            <div class="d-flex h-100 align-items-center hero__content-width">
                <div>
                    <h1 class="hero__heading fw-bold" style="font-size: 50px; color: #FFFFFF;">Rumah Sorai</h1>
                    <p class="lead fw-bold" style="color: #FFFFFF; font-size: bold">Berangkat dari diskusi panjang, 
                    Sorai Riang Dinamika resmi terlahir di tahun 2018. Terlahir sebagai salah satu label perusahaan musik, Sorai Riang Dinamika bertujuan menjadi 
                    wadah pengembangan industri musik beserta musisi di Tanah Air.</p>
                    <a href="/product" class="mt-2 btn btn-dark" role="button"><span></span>Go To Product</a>
                </div>
            </div>
        </div>
    </center>
@endsection
