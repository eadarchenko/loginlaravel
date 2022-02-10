<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrarController extends Controller
{
    protected function validator(array $data){
        return Validator::make($data,[
            'nickname'=>['required','string','max:255','unique:name'],
            'email'=>['required','string','max:255','unique:users'],
            'password'=>['required','string','min:8',]
        ]);
    }

    protected function create(array $data) {
        return User::create([
            'nickname' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), //encrypta la contraseña
        ]);
    }
}
