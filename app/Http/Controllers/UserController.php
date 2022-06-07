<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if($user) {
            if(password_verify($request->password, $user->password)) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang ' . $user->namaLengkap,
                    'user' => $user,
                ]);
            }

            return response()->json([
                'success' => 0,
                'message' => 'Password salah',
            ]);
        }

        return response()->json([
            'success' => 0,
            'message' => 'Email tidak ditemukan',
        ]);
    }

    public function register(Request $request) {
        $validation = Validator::make($request->all(), [
            'noKTP' => ['required', 'string', 'min:16', 'max:16', 'unique:users,noKTP'],
            'namaLengkap' => ['required', 'string', 'max:255'],
            'noHP' => ['required', 'string', 'min:10', 'max:15', 'unique:users,noHP'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($validation->fails()) {
            $val = $validation->errors()->all();
            return response()->json([
                'success' => 0,
                'message' => implode("\n", $val),
            ]);
        }

        $request->role = 'Customer';

        $user = User::create([
            'noKTP' => $request->input('noKTP'),
            'namaLengkap' => $request->input('namaLengkap'),
            'noHP' => $request->input('noHP'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'Customer',
        ]);

        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Selamat datang ' . $user->namaLengkap,
                'user' => $user
            ]);
        }

        return response()->json([
            'success' => 0,
            'message' => 'Registrasi gagal'
        ]);

    }
}
