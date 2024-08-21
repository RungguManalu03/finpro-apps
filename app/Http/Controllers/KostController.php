<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KostController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('kosts');

        if ($request->filled('nama_kost')) {
            $query->where('nama_kost', 'LIKE', '%' . $request->nama_kost . '%');
        }

        if ($request->filled('lokasi')) {
            $query->where('lokasi', 'LIKE', '%' . $request->lokasi . '%');
        }

        if ($request->filled('services')) {
            $services = explode(',', $request->services);
            foreach ($services as $service) {
                $query->where('services', 'LIKE', '%' . trim($service) . '%');
            }
        }

        if ($request->filled('harga_min')) {
            $query->where('harga', '>=', $request->harga_min);
        }
        if ($request->filled('harga_max')) {
            $query->where('harga', '<=', $request->harga_max);
        }

        $data = $query->paginate(6);

        return view('kost.kost', [
            'data' => $data,
            'query' => $request->query()
        ]);
    }

    public function detailKost($id)
    {
        $kost = DB::table('kosts')->where('id', $id)->first();
        return view('kost.detail-kost', compact('kost'));
    }
}
