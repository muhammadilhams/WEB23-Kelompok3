<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,buyer,seller'], // Menambahkan validasi role
        ]);
    }

    protected function create(array $data)
    {
        // Menambahkan kolom role pada data yang akan disimpan
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'], // Menyimpan role
        ]);
    }

    // Override metode registered untuk mengarahkan pengguna berdasarkan role
    protected function registered($request, $user)
    {
        // Tentukan rute berdasarkan role
        $redirectTo = RouteServiceProvider::HOME; // Default

        switch ($user->role) {
            case 'admin':
                $redirectTo = '/products';
                break;
            case 'buyer':
                $redirectTo = '/products1';
                break;
            case 'seller':
                $redirectTo = '/products';
                break;
            // Tambahkan case lain sesuai kebutuhan
        }

        return redirect($redirectTo);
    }
}

