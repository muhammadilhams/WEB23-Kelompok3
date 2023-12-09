<?php

namespace App\Http\Controllers\User;

use App\Models\Car;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Driver;
use App\Request\Admin\PaymentStoreRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->get();
        $drivers = Driver::latest()->get();
        return view('user.homepage', compact('cars', 'drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function driver()
    {
        $cars = Car::latest()->get();
        return view('user.driver', compact('drivers'));
    }

    public function detail(Car $car)
    {
        $cars = Car::latest()->get();
        return view('user.detail', compact('car'));
    }

    public function payment(Request $request)
    {
        $carSlug = $request->query('car_slug');
        $car = Car::where('slug', $carSlug)->first();
        
        $drivers = Driver::where('status', 'tersedia')->get();
        
        return view('user.payments', compact('car', 'drivers'));
    }

    public function paymentStore(PaymentStoreRequest $request)
    {
        // Validasi request
        $validatedData = $request->validated();

        // Temukan mobil berdasarkan slug yang diberikan
        $carSlug = $request->input('car_slug');
        $car = Car::where('slug', $carSlug)->first();

        if (!$car || $car->status === 'tidak tersedia') {
            return redirect()->back()->with([
                'message' => 'Maaf, mobil tidak tersedia untuk disewa.',
                'alert-type' => 'error'
            ]);
        }

        // Periksa status mobil, jika tidak tersedia, kembalikan dengan pesan error
        if ($car->status === 'tidak tersedia') {
            return redirect()->back()->with([
                'message' => 'Maaf, mobil tidak tersedia untuk disewa.',
                'alert-type' => 'error'
            ]);
        }

        // Simpan gambar_payment dan foto_ktp ke storage
        $gambarPaymentPath = $request->file('gambar_payment')->store('assets/payment', 'public');
        $fotoKtpPath = $request->file('foto_ktp')->store('assets/foto_ktp', 'public');

        // Buat slug dari NIK
        $slug = Str::slug($validatedData['nik'], '-');

        // Buat entitas Payment dengan status awal "menunggu"
        $payment = Payment::create([
            'nama' => $validatedData['nama'],
            'nik' => $validatedData['nik'],
            'tanggal' => $validatedData['tanggal'],
            'gambar_payment' => $gambarPaymentPath,
            'foto_ktp' => $fotoKtpPath,
            'slug' => $slug,
            'sewa_driver' => $request->input('driver', 0),
            'status' => 'menunggu', // Set status awal
        ]);

        // Hubungkan entitas Payment dengan mobil yang sesuai
        $payment->car()->associate($car);

        // Jika driver dipilih, hubungkan pembayaran dengan driver
        if ($request->input('driver')) {
            $driver = Driver::find($request->input('driver'));

            // Ubah status driver menjadi tidak tersedia
            $driver->update(['status' => 'tidak tersedia']);

            $payment->driver()->associate($driver);
        }

        $payment->save();

        // Redirect ke halaman pembayaran dengan pesan sukses
        return redirect()->route('user.index')->with([
            'message' => 'Payment Berhasil di kirim',
            'alert-type' => 'success'
        ]);
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update the password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Save the changes
        $user->save();

        return redirect()->route('user.index')->with([
            'message' => 'Profile successfully updated.',
            'alert-type' => 'success'
        ]);
    }

    public function search(Request $request)
    {
        $nama_mobil = $request->input('search'); // Ambil nilai yang diinputkan pengguna
        $jumlah_kursi = $request->input('search'); // Ambil nilai yang diinputkan pengguna
    
        $cars = Car::where('nama_mobil', 'like', '%' . $nama_mobil . '%')->get();
        $cars = Car::where('jumlah_kursi', 'like', '%' . $jumlah_kursi . '%')->get();
        return view('user.search', ['cars' => $cars]);
    }

    public function home() {
        return view('user.homepage');
    }

    public function pay() {
        return view('user.payments');
    }


}
