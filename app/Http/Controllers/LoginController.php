<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
   public function authenticate(Request $request) {
        $credentials = $request->validate([
            'nickname' =>['required|unique:id,'],
            'email' => ['required|unique|string'],
            'password' => ['required']
        ]);

        if (Auth::check()) {
            return 'Ya estaba logueado';
        }

        if (Auth::attempt($credentials)) {
            return Auth::user()->toJson();
        }

       // return 'No funciono';
    }
}
