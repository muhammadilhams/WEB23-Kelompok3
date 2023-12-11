<?php

namespace App\Http\Controllers;

// use App\Models\Genshin;
use App\Models\Genshin;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Do_;

class GenshinController extends Controller
{
    public function index() {
        $karakter = Genshin::all();
        return view('index', compact('karakter'));
    }

    public function viewchar($id)
    {
        $karakter = Genshin::where('id', $id)->get();
        if ($karakter->isEmpty()) {
            $karakter = Genshin::where('id', $id)->get();
            return view('viewdetails', compact('karakter'));
        } else {
            return view('viewdetails', compact('karakter'));
        }
    }
    public function addchar()
    {
        return view("addchar");
    }
    public function insertchar(Request $request)
    {
        Genshin::create($request->all());
        return redirect()->route("char");
    }
    public function editchar($id)
    {
        $data = Genshin::find($id);
        return view("editchar", compact("data"));
    }
    public function updatechar(Request $request, $id)
    {
        $data = Genshin::find($id);
        $data->update($request->all());
        return redirect()->route("char");
    }
    public function deletechar($id)
    {
        $data = Genshin::find($id);
        $data->delete();
        return redirect()->route("char");
    }
}
