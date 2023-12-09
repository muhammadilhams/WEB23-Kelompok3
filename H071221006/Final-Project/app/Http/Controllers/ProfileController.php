<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('layouts.profile');
    }

    public function update(Request $request)
    {
        // Lakukan validasi data yang diterima dari form

        // Simpan perubahan profil pengguna

        // Redirect kembali ke halaman profil
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}

