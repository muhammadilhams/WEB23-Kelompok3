<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    // public function storeuser(Request $request)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string'],
    //         'email' => ['required', 'string', 'lowercase', 'email'],
    //         'roles' => ['required', Rule::in(['Seller', "Buyer"])],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);
    //     $role = $request->input('roles');

    //     $user = Users::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'roles' => $request->roles,
    //         'password' => Hash::make($request->password),
    //         'confirm_password' => Hash::make($request->confirm_password),
    //     ]);

    //     $user->assignRole($role);
    // }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function addregist(Request $request){
        Users::create($request->all());
        return redirect()->route("homepage");
    }
}
