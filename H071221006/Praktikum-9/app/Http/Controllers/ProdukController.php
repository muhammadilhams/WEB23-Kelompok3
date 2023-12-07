<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller {

    public function index()
    {
        $produks = Produk::all();
        return view('index', compact('produks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Produk::create($request->all());
        return redirect()->route('produks.index');
    }

    public function show(Produk $produk)
    {
        return view('show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $produk->update($request->all());
        return redirect()->route('produks.index');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produks.index');
    }

}
