@extends('layouts.main')


@section('content')
    <div class="row mt-3">
        @foreach ($products as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    {{-- <img src="resources/img/car.jpg" class="card-img-top"
                        alt="Product Image"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->productName }}
                            <p class="badge text-bg-primary">{{ $item->productLine }}</p>
                        </h5>
                        <p class="card-text">{{ substr($item->productVendor, 0, 100) }}</p>
                        <h6 class="text-end mb-3">Stock: {{ $item->quantityInStock }}</h6>
                        <a href="/products/{{ $item->productCode }}" class="btn btn-primary mt-auto">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection