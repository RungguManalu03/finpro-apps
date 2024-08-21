<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    function registerAuthenticate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'required',
                'no_telepon' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required'
            ], [
                'nama_lengkap.required' => 'Nama lengkap harus diisi.',
                'no_telepon.required' => 'Nomor Telepon harus diisi.',
                'email.required' => 'Email harus diisi.',
                'email.unique' => 'Email tersebut sudah terdaftar.',
                'password.required' => 'Password harus diisi.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'data' => [],
                    'message' => $validator->errors()
                ]);
            }

            DB::table('users')->insert([
                'nama_lengkap' => $request->nama_lengkap,
                'no_telepon' => $request->no_telepon,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'created_at' => Carbon::parse(now())->timezone('Asia/Jakarta'),
                'updated_at' => Carbon::parse(now())->timezone('Asia/Jakarta'),
            ]);

            return response()->json([
                'error' => false,
                'data' => [],
                'message' => 'Berhasil menambahkan user',
                'redirectUrl' => '/login',
            ]);
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    function loginAuthenticate(Request $request)
    {

        $credential = $request->validate([
            'email'       => 'required',
            'password'  => 'required',
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == "admin") {
                return response()->json(['success' => true, 'redirectUrl' => '/manajemen-user', 'message' => 'Berhasil Login']);
            } else {
                return response()->json(['success' => true, 'redirectUrl' => '/', 'message' => 'Berhasil Login']);
            }

            return redirect()->back();
        } else {
            return response()->json(['failed' => false, 'message' => 'Email atau password salah']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/login');
    }
}
