<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function storeuser(Request $request)
    // {
    //     $request->validate()
    // }
    public function home(){
        $bookNovel = Book::all();
        return view('home', compact('bookNovel'));
    }
}
