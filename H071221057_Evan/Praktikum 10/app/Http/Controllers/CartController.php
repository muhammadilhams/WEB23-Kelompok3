<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Product $product)
    {
        $userId = auth()->id();

        // Menambahkan item ke keranjang dan mendapatkan rowId
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1,
            'options' => ['user_id' => $userId],
            'associatedModel' => $product,
        ]);

        // Menggunakan rowId untuk mengarahkan pengguna ke item yang baru ditambahkan
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.')->with('rowId', $cartItem->rowId);
    }

    public function remove($productId)
    {
        $userId = auth()->id();
    
        // Mencari item berdasarkan ID produk dan user ID
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($productId, $userId) {
            return $cartItem->id == $productId && $cartItem->options->user_id == $userId;
        })->first();
    
        if ($cartItem) {
            // Menghapus item dari keranjang
            Cart::remove($cartItem->rowId);
            return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully.');
        }
    
        return redirect()->route('cart.index')->with('error', 'Product not found in cart.');
    }
}

