<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductLines;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function get_products()
    {
        $productlines = ProductLines::all();
        $products = Product::all();
        return view('products', compact('products', 'productlines'));
    }

    public function get_details($value)
    {
        $productlines = ProductLines::all();
        foreach ($productlines as $item) {
            if ($value === $item->productLine) {
                $products = Product::all()->where('productLine', $value);
                return view('products', compact('products', 'productlines'));
            }
        }
        $productdetails = Product::all()->where('productCode', $value);
        return view('product-details', compact('productdetails', 'productlines'));
    
    }
}
