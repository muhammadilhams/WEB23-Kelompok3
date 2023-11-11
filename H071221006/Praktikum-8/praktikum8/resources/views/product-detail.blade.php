@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                {{-- <img src="resources/img/harley.jpg" alt="Product Image" --}}
                    class="img-fluid">
            </div>
            <div class="col-md-8">
                @foreach ($productdetails as $item)
                    <h2>{{ $item->productName }}</h2>
                    <p>{{ $item->productVendor }}</p>
                    <p>Stock: {{ $item->quantityInStock }}</p>
                    <a href="#" class="btn btn-primary">Buy Now</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection