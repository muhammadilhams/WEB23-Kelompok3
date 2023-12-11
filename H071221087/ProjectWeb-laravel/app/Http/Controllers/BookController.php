<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function addbooks(Request $request){
        // Book::create($request->all());
        // return redirect()->route("homepage");
        $request->validate([
            'name' => 'required',
            'stok' => 'required',
            'price' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:10000'
        ]);

        //upload image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('novel'), $imageName);

        $book = new Book;
        $book->image = $imageName;
        $book->name = $request->name;
        $book->stok = $request->stok;
        $book->price = $request->price;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->description = $request->description;

        $book->save();

        return redirect()->route('homepage');
    }

    public function detail($id) {
        $bookNovel = Book::where('id', $id)->get();
        return view('detail', compact('bookNovel'));
    }

    public function show($bookCategory) {
        $bookNovel = Book::where('kategori', $bookCategory)->get();
        return view('bookprov', compact('bookNovel'));
    }

    public function seller() {
        $bookNovel = Book::all();
        return view('seller', compact('bookNovel'));
    }
}
