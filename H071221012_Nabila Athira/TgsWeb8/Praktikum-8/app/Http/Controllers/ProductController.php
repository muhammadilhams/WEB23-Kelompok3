<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    // Method untuk menampilkan semua produk
    public function index()
    {
        // Mengambil semua produk dari database
        $products = Product::all(); 
        // Menampilkan halaman products.blade.php dengan data produk
        return view('products', ['products' => $products]); 
    }

    // Method untuk mencari produk berdasarkan productLine
    public function search(Request $request)
    {
        // Ambil nilai yang diinputkan pengguna dari form
        $productLine = $request->input('productLine'); 

        // Mencari produk berdasarkan productLine dari database
        $products = Product::where('productLine', $productLine)->get(); 

        // Menampilkan halaman productlines.blade.php dengan data produk hasil pencarian
        return view('productlines', ['products' => $products]); 
    }

    // Method untuk menampilkan detail produk berdasarkan nama produk
    public function showProduct($productName)
    {
        // Mencari produk berdasarkan nama produk
        $product = Product::where('productName', $productName)->first(); 

        // Menampilkan halaman show.blade.php dengan data produk yang ditemukan
        return view('show', ['product' => $product]); 
    }
}

// controller untuk hubungkan route atau action -->


