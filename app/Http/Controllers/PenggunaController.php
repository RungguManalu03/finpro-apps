<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string|max:255',
        ]);

        $fotoTransaksiPath = null;
        if ($request->hasFile('foto_transaksi')) {
            $fotoTransaksiPath = $request->file('foto_transaksi')->store('images', 'public');
        }

        DB::table('transaksis')->insert([
            'user_id' => $request->user_id,
            'kost_id' => $request->kost_id,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'foto_transaksi' => $fotoTransaksiPath,
            'deskripsi' => $request->deskripsi,
            'status' => "request",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil dikirim.');
    }
}
