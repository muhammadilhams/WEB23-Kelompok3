<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class productController extends Controller
{
    function readAll(){
        $reads = DB::table('products')->get();
        return view('product', compact('reads'));
    }
    
    function readMotorcycles(){
        $reads = DB::table('products')
        ->where('productline','=','Motorcycles')
        ->get(); //compact untuk menyimpan data2 ke array
        return view('productMotorcycles', compact('reads'));
    }
    function readClassicCars(){
        $reads = DB::table('products')
        ->where('productline','=','Classic Cars')
        ->get(); 
        return view('productClassicCars', compact('reads'));
    }
    function readPlanes(){
        $reads = DB::table('products')
        ->where('productline','=','Planes')
        ->get(); 
        return view('productPlanes', compact('reads'));
    }
    function readTrains(){
        $reads = DB::table('products')
        ->where('productline','=','Trains')
        ->get(); 
        return view('productTrains', compact('reads'));
    }
    function readShips(){
        $reads = DB::table('products')
        ->where('productline','=','Ships')
        ->get(); 
        return view('productShips', compact('reads'));
    }
    function readVintageCars(){
        $reads = DB::table('products')
        ->where('productline','=','Vintage Cars')
        ->get(); 
        return view('productVintageCars', compact('reads'));
    }
    function readTrucksBuses(){
        $reads = DB::table('products')
        ->where('productline','=','Trucks and Buses')
        ->get(); 
        return view('productTrucksBuses', compact('reads'));
    }
    
    public function detailData($productCode) {
        $reads = DB::table('products')
        ->where('productCode','=',$productCode)
        ->get();
    
        return view('detailProduct', compact('reads'));
    }
    
}
