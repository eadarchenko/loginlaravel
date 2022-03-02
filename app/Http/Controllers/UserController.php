<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function insert(Request $request) {
        $data = $request->only(['name',  'email', 'password']);

        $request->validate([
            'name' => 'required',
            'age' =>  'required|integer|digits_between:1,2'
        ]);

        try {
            DB::table('users')->insert($data);
            return response()->json([
                'success' => true,
                'mensaje' => 'Usuario insertado',
                'data'    => null
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'mensaje' => $e->getMessage(),
                'data'    => $e->getTraceAsString(),
            ], 500);
        }

    }

    public function getAll(Request $request) {
        return response()->json([
            'success' => true,
            'mensaje' => 'Obtengo a todos los usuarios',
            'data'    => DB::table('users')->get()
        ]);
    }
}
