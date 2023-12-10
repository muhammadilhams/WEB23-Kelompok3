<?php

namespace App\Http\Controllers;

use App\Models\Car;
// use Symfony\Component\Mime\Message;
use App\Models\Driver;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        try {
            $cars = Car::latest()->get();
            $drivers = Driver::latest()->get();
            return view('user.homepage', compact('cars', 'drivers'));
        } catch (\Exception $e) {
            // Tampilkan pesan kesalahan jika diperlukan
            dd($e->getMessage());
        }
    }

    public function contact() {
        return view('frontend.contact');
    }

    public function contactStore(Request $request) {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required',
            'gambar_sim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Upload gambar SIM
        $gambarSimPath = $request->file('gambar_sim')->store('gambar_sim');
    
        // Upload gambar KTP
        $gambarKtpPath = $request->file('gambar_ktp')->store('gambar_ktp');
    
        // Set nilai 'bukti' sebagai path gambar yang sesungguhnya
        $data['bukti'] = ['gambar_sim' => $gambarSimPath, 'gambar_ktp' => $gambarKtpPath];
    
        Message::create($data);
    
        return redirect()->back()->with([
            'message' => 'Pesan anda berhasil dikirim',
            'alert-type' => 'success'
        ]);
    }
    

    public function detail(Car $car) {
        return view('frontend.detail', compact('car'));
    }

}
