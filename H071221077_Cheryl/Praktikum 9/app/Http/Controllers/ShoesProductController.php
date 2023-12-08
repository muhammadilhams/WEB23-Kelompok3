<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoesProduct;

class ShoesProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //Mengambil semua produk dari database
    {
        $shoesProducts = ShoesProduct::all();
        return view('index', compact('shoesProducts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request) //utk simpan data baru yg sdh dibuat
    {
        $data = $this->validateProductData($request);

        ShoesProduct::create($data);

        return redirect()->route('shoes-products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(ShoesProduct $shoesProduct) 
    {
        return view('show', compact('shoesProduct'));
    }

    public function edit(ShoesProduct $shoesProduct)
    {
        return view('edit', compact('shoesProduct'));
    }

    public function update(Request $request, ShoesProduct $shoesProduct)
    {
        $data = $this->validateProductData($request);

        $shoesProduct->update($data);

        return redirect()->route('shoes-products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(ShoesProduct $shoesProduct)
    {
        $shoesProduct->delete();

        return redirect()->route('shoes-products.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function validateProductData(Request $request) //Menangani pengiriman formulir untuk memperbarui produk  yang sudah ada di database
    {
        return $request->validate([
            'brand' => 'required',
            'size' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
    }
}
