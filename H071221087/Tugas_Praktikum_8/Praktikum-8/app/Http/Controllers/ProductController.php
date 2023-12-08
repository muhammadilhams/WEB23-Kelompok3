<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }

    public function show($productLine)
    {
        $products = Product::where('productCode', $productLine)->get();
        if ($products->isEmpty()) {
            $products = Product::where('productLine', $productLine)->get();
            return view('product', compact('products'));
        } else {
            return view('details', compact('products'));
        }
    }

    public function search(Request $request)
    {
        $productLine = $request->input('productLine');
        $products = Product::where('productLine', $productLine)->get();

        if ($products->isEmpty()) {
            echo "<script>alert('Produk Tidak Ditemukan');</script>";
        }

        return view('productlines', ['products' => $products]);
    }

}
