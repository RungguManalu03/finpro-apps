<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index($id) {
        $user = DB::table('users')->where('id', $id)->first();
        return view('profil.profil', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:255',
        ]);

        if ($request->hasFile('foto_profil')) {
            $imagePath = $request->file('foto_profil')->store('images', 'public');
        } else {
            $imagePath = DB::table('users')->where('id', $id)->value('foto_profil');
        }

        DB::table('users')->where('id', $id)->update([
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'email' => $validatedData['email'],
            'no_telepon' => $validatedData['no_telepon'],
            'foto_profil' => $imagePath,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
