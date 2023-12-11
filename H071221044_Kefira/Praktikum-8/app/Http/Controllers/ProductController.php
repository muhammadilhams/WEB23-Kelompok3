<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        //tampilkan semua produk yang ada, ambil semua data produk dari database
        $products = Product::all();
        //kasih kmbali nilai semua produk
        return view('products', ['products' => $products]);
    }

    public function search(Request $request)
    //cari produk berdasarkan productline
    {
        $productLine = $request->input('productLine'); // Ambil nilai yang diinputkan pengguna
//cari nilai yang memiliki nilai kolom productline yg sesuai dengan nilai yang diinputkan pengguna
        $products = Product::where('productLine', $productLine)->get();
//dikirim dan kembalikan ke tampilan dengan nama producline
        return view('productlines', ['products' => $products]);
    }

    public function showProduct($productName)
  //menampilkan data produk berdasarkan product name
    {
      //mencari produk yg memiliki nama sesuai nilai yg diberikan
        $product = Product::where('productName', $productName)->first();
//kembalikan nilai produk
        return view('show', ['product' => $product]);
    }
}
