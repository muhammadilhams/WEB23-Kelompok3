<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $favoriteItems = auth()->user()->favorites;

        return view('favorites.index', compact('favoriteItems'));
    }

    public function add(Product $product)
    {
        $userId = auth()->id();

        Favorite::create([
            'user_id' => $userId,
            'product_id' => $product->id,
        ]);

        return redirect()->route('favorites.index')->with('success', 'Product added to favorites successfully.');
    }

    public function remove($favoriteId)
    {
        Favorite::destroy($favoriteId);

        return redirect()->route('favorites.index')->with('success', 'Product removed from favorites successfully.');
    }
}

