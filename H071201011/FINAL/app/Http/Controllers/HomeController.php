<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $carList = Car::all();
            return view('admincar', compact('carList'));
        } else {
            return view('beranda');
        }
    }

    public function carList()
    {
        return view('carlist');
    }

    public function inputCar(Request $request): RedirectResponse
    {
        $photoName = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('images'), $photoName);

        Car::updateOrCreate(
            [
                'number_license'  => $request->input('number_license'),
            ],
            [
                'car_type' => $request->input('car_type'),
                'price_per_hour'  => $request->input('price_per_hour'),
                'number_license'  => $request->input('number_license'),
                'bahan_bakar' => $request->input('bahan_bakar'),
                'keluaran_tahun' => $request->input('keluaran_tahun'),
                'status' => $request->input('status'),
                'foto' => $photoName,
            ],
        );
        return redirect('/home');
    }
}
