<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Storage;
use App\Models\Matkul;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;


class MatkulController extends Controller
{
    function main() {
        $matkul=Matkul::all();
        return view('main',['Listmatkul'=>$matkul]);
    }
    function create() {
        return view('insert');
    }
    function simpan(Request $request) {
        $matkul=$request->all();
        Matkul::create($matkul);
        return redirect('main');
    }
    public function hapus($id){
        Matkul::find($id)->delete();
       return redirect('main');
   }
    public function ubah($id) {
        $matkul=Matkul::find($id);
        return view('ubah',compact('matkul'));
    }
    function update(Request $request,$id) {
        $matkul=$request->all();
        $matkulbaru=Matkul::find($id);
        $matkulbaru->update($matkul);
        return redirect('main');
    }
    public function displayImage($filename)

{

    $path = Storage('images/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;

}
    // function export(){
    //     $pdf=PDF::loadView('main',$data)
    //     return $pdf->down
    // }
    

}
