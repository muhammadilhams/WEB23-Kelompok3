<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    //menampilkan data 
    public function index()
    {
        // mengembalikan nilai ke view index 
        // paginate(5) utk menampilkan data nya cuma 5 di halamannya 
        return view('index', ['products'=> Product::latest()->paginate(5) ]);
    }

    public function create()
    {
        return view('create');
    }
    
    // mengambil nilai dari inputan terus dikirim & disimpan dlm database
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            //validate utk tampilkan pesan jika tdk diisi 
            'nama' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:10000'
        ]);

        //variabel baru untuk upload image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('img'), $imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->jenis = $request->jenis;
        $product->deskripsi = $request->deskripsi;

        $product->save();

        return redirect()->route('product.index')->withSuccess('Product Telah Di tambahkan!!!');
        //withSuccess nnti ditambahkan di index 
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('show', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('edit', ['product' => $product]);
    }


    public function update(Request $request, $id)
    {
        //validasi data
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'jenis' => 'nullable',
            'deskripsi' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:10000'
        ]);

        $product = Product::where('id', $id)->first();

        if(isset($request->image)){
            //upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img'), $imageName);
            $product->image = $imageName;
        }
        // inputan          disimpan ke database
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->jenis = $request->jenis;
        $product->deskripsi = $request->deskripsi;

        $product->save();

        return redirect()->route('product.index')->withSuccess('Product Berhasil Di Ubah!!!');
    }

    public function destroy($id)
    {
        $product =Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Produk Berhasil di Hapus!!!');
    }

    public function search(Request $request)
    {
        $jenis = $request->input('jenis'); // Ambil nilai yang diinputkan pengguna

        $products = Product::where('jenis', $jenis)->get();

        return view('jenis', ['products' => $products]);
    }
}
