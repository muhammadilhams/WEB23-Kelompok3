@extends('layouts.app1')

@section('content')
    <div class="container">
        <h2>Favorite Products</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($favoriteItems)
            @forelse ($favoriteItems as $favorite)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $favorite->product->name }}</h5>
                        <p class="card-text">Price: ${{ $favorite->product->price }}</p>
                        <form action="{{ route('favorites.remove', $favorite->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Remove from Favorite</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No favorite products.</p>
            @endforelse
        @else
            <p>No favorite products.</p>
        @endif
    </div>
@endsection
