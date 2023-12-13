@extends('layouts.main')
<style>
    .section_home {
        position: relative;
        height: 80vh;
        width: 100%;
        background-size: cover;
        background-position: bottom center;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .text h1 span {
        font-size: 6rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
        animation: flip 2s infinite;
        animation-delay: calc(.2s * var(--i))
    }

    @keyframes flip {

        0%,
        80% {
            transform: rotateY(360deg)
        }
    }

    .text p {
        font-size: 1rem;
        font-weight: 500;
        line-height: 30px;
        color: #4F6F52;
        margin-bottom: 35px;
    }

    .text-button {
        display: inline-block;
        padding: 13px;
        border-radius: 13px;
        background-color: #3A4D39;
        color: black;
        font-size: 15px;
        font-weight: 350;
        transition: all .50s ease;
        cursor: pointer;
    }

    .text-button:hover {
        transform: translateX(10px);
        border: 5px solid #4F6F52;
        background: transparent;
        color: #4F6F52;
    }

    .text-button a {
        text-decoration: none;
        color: black;
    }
</style>

@section('container')
    <div class="section_home">
        <div class="text">
            <h1>Welcome To<br>
                <span style="--i:1">C</span>
                <span style="--i:2">l</span>
                <span style="--i:3">a</span>
                <span style="--i:4">s</span>
                <span style="--i:5">s</span>
                <span style="--i:6">i</span>
                <span style="--i:7">c</span>
                <span style="--i:8">M</span>
                <span style="--i:9">o</span>
                <span style="--i:10">d</span>
                <span style="--i:11">e</span>
                <span style="--i:12">l</span>
                <span style="--i:13">s</span>
            </h1>
            <p>Kami adalah sumber utama bagi para pecinta kendaraan klasik yang
                bersemangat.<br>
                Kami mengundang Anda untuk menjelajahi koleksi kami yang penuh pesona. <br>
                Selamat menemukan pesona klasik di dunia kendaraan bersama kami!
            </p>
            <button class="text-button"><a href="/product">Go to products</a>
            </button>
        </div>
    </div>
@endsection
