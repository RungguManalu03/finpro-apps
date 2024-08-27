<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function manajemenUser()
    {
        return view('admin.manajemen-user');
    }

    function manajemenKost()
    {
        return view('admin.manajemen-kost');
    }

    function manajemenBookings()
    {
        return view('admin.manajemen-booking');
    }

    function findDataUser(Request $request)
    {
        try {
            $subQuery = DB::table('users')->select('id', 'nama_lengkap', 'email', 'no_telepon', 'foto_profil')
            ->where('role', 'user');

            if ($request->has('search') && !empty($request->search['value'])) {
                $searchUser = $request->search['value'];
                $subQuery->where(function ($a) use ($searchUser) {
                    $a
                        ->where(DB::raw('LOWER(nama_lengkap)'), 'LIKE', '%' . strtolower($searchUser) . '%')
                        ->orWhere(DB::raw('LOWER(email)'), 'LIKE', '%' . strtolower($searchUser) . '%');
                });
            }

            $queryUser = DB::table(DB::raw("({$subQuery->toSql()}) as tmp"))
            ->mergeBindings($subQuery)
                ->select('*')
                ->get();

            if ($request->ajax()) {
                return DataTables::of($queryUser)
                    ->addIndexColumn()
                    ->addColumn('nama_lengkap', function ($row) {
                        return $row->nama_lengkap;
                    })
                    ->addColumn('email', function ($row) {
                        return $row->email;
                    })
                    ->addColumn('no_telepon', function ($row) {
                        return $row->no_telepon;
                    })
                    ->addColumn('foto_profil', function ($row) {
                        $fotoProfilPath = $row->foto_profil ? asset('storage/' . $row->foto_profil) : asset('storage/images/default.jpg');
                        return '<img src="' . $fotoProfilPath . '" alt="Foto Profil" width="50" height="50" style="border-radius: 50%;">';
                    })
                     // <li class="detail">
                                //     <a href="' . route('profile', $row->id) . '" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i>Detail</a>
                                // </li>
                    ->addColumn('action', function ($row) {
                        $html_code =
                            '<div class="dropdown d-inline-block">
                            <button class="btn btn-soft-secondary btn-sm dropdown ps-2 pe-1 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; font-weight: 500; font-size: 14px;">
                                Action
                                <i class="ri-arrow-drop-down-fill" style="font-size: 20px;"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="edit">
                                    <button id="btn-detail-user" data-id="' . $row->id . '" class="dropdown-item"><i class="ri-edit-2-fill align-bottom me-2 text-muted"></i>Edit</button>
                                </li>
                                <li class="delete"><button data-id="' . $row->id . '" id="btn-delete-user" class="dropdown-item remove-item-btn text-danger"><i class="ri-delete-bin-fill align-bottom me-2"></i> Hapus</button></li>
                            </ul>
                        </div>';
                        return $html_code;
                    })
                    ->rawColumns(['foto_profil', 'action'])
                    ->make(true);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    public function findDataUserByID(Request $request)
    {
        try {
            $data = DB::table('users')
            ->select('users.id', 'users.nama_lengkap', 'users.email', 'users.no_telepon',)
            ->where('users.id', $request->id)
                ->first();
            if ($data) {
                return response()->json([
                    $data->id,
                    $data->nama_lengkap,
                    $data->email,
                    $data->no_telepon,
                ]);
            } else {
                return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan']);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    function findDataKost(Request $request)
    {
        try {
            $subQuery = DB::table('kosts')->select('id', 'nama_kost', 'lokasi', 'pemilik', 'services', 'foto_kost');

            if ($request->has('search') && !empty($request->search['value'])) {
                $searchUser = $request->search['value'];
                $subQuery->where(function ($a) use ($searchUser) {
                    $a
                        ->where(DB::raw('LOWER(nama_kost)'), 'LIKE', '%' . strtolower($searchUser) . '%')
                        ->orWhere(DB::raw('LOWER(lokasi)'), 'LIKE', '%' . strtolower($searchUser) . '%')
                        ->orWhere(DB::raw('LOWER(pemilik)'), 'LIKE', '%' . strtolower($searchUser) . '%');
                });
            }

            $queryUser = DB::table(DB::raw("({$subQuery->toSql()}) as tmp"))
            ->mergeBindings($subQuery)
                ->select('*')
                ->get();

            if ($request->ajax()) {
                return DataTables::of($queryUser)
                    ->addIndexColumn()
                    ->addColumn('nama_kost', function ($row) {
                        return $row->nama_kost;
                    })
                    ->addColumn('lokasi', function ($row) {
                        return $row->lokasi;
                    })
                    ->addColumn('pemilik', function ($row) {
                        return $row->pemilik;
                    })
                    ->addColumn('services', function ($row) {
                        return $row->services;
                    })
                    ->addColumn('gambar', function ($row) {
                        $fotoProfilPath = $row->foto_kost ? asset('storage/' . $row->foto_kost) : asset('storage/images/default.jpg');
                        return '<img src="' . $fotoProfilPath . '" alt="Foto Profil" width="50" height="50" style="border-radius: 50%;">';
                    })

                    ->addColumn('action', function ($row) {
                        $html_code =
                            '<div class="dropdown d-inline-block">
                            <button class="btn btn-soft-secondary btn-sm dropdown ps-2 pe-1 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; font-weight: 500; font-size: 14px;">
                                Action
                                <i class="ri-arrow-drop-down-fill" style="font-size: 20px;"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="edit">
                                    <button id="btn-detail" data-id="' . $row->id . '" class="dropdown-item"><i class="ri-edit-2-fill align-bottom me-2 text-muted"></i>Edit</button>
                                </li>
                                <li class="delete"><button data-id="' . $row->id . '" id="btn-delete" class="dropdown-item remove-item-btn text-danger"><i class="ri-delete-bin-fill align-bottom me-2"></i> Hapus</button></li>
                            </ul>
                        </div>';
                        return $html_code;
                    })
                    ->rawColumns(['gambar', 'action'])
                    ->make(true);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    public function findDataKostByID(Request $request)
    {
        try {
            $data = DB::table('kosts')
            ->select('id', 'nama_kost', 'harga', 'lokasi', 'pemilik', 'kontak_wa', 'kontak_email', 'services', 'deskripsi')
            ->where('kosts.id', $request->id)
                ->first();
            if ($data) {
                return response()->json([
                    $data->id,
                    $data->nama_kost,
                    $data->harga,
                    $data->lokasi,
                    $data->pemilik,
                    $data->services,
                    $data->kontak_wa,
                    $data->kontak_email,
                    $data->deskripsi,
                ]);
            } else {
                return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan']);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    function findDataBooking(Request $request)
    {
        try {
            $query = DB::table('transaksis')
            ->join('users', 'transaksis.user_id', '=', 'users.id')
            ->join('kosts', 'transaksis.kost_id', '=', 'kosts.id')
            ->select(
                'transaksis.id as id',
                'transaksis.foto_transaksi',
                'transaksis.deskripsi',
                'transaksis.email',
                'transaksis.no_wa',
                'transaksis.status',
                'users.nama_lengkap',
                'kosts.nama_kost',
                'kosts.harga',
                'kosts.lokasi'
            );
            if (Auth::user()->role !== 'admin') {
                $query->where('transaksis.user_id', Auth::user()->id);
            }
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $query->where(function ($subQuery) use ($searchValue) {
                    $subQuery->where(DB::raw('LOWER(users.nama_lengkap)'), 'LIKE', '%' . strtolower($searchValue) . '%')
                        ->orWhere(DB::raw('LOWER(transaksis.email)'), 'LIKE', '%' . strtolower($searchValue) . '%')
                        ->orWhere(DB::raw('LOWER(kosts.nama_kost)'), 'LIKE', '%' . strtolower($searchValue) . '%');
                });
            }

            $result = $query->get();

            if ($request->ajax()) {
                return DataTables::of($result)
                    ->addIndexColumn()
                    ->addColumn('nama_lengkap', function ($row) {
                        return $row->nama_lengkap;
                    })
                    ->addColumn('nama_kost', function ($row) {
                        return $row->nama_kost;
                    })
                    ->addColumn('harga', function ($row) {
                        return $row->harga;
                    })
                    ->addColumn('lokasi', function ($row) {
                        return $row->lokasi;
                    })
                    ->addColumn('status', function ($row) {
                        if ($row->status === 'approved') {
                            return '<span class="badge bg-success">Approved</span>';
                        } else {
                            return '<span class="badge bg-secondary">Request</span>';
                        }
                    })
                    ->addColumn('foto_transaksi', function ($row) {
                        $fotoTransaksiPath = asset('storage/' . $row->foto_transaksi);
                        return '<img src="' . $fotoTransaksiPath . '" alt="Foto Transaksi" width="50" height="50" style="border-radius: 50%;" onclick="previewImage(\'' . $fotoTransaksiPath . '\')">';
                    })
                    ->addColumn('action', function ($row) {
                        $whatsappLink = "https://wa.me/{$row->no_wa}";
                        $gmailLink = "https://mail.google.com/mail/?view=cm&fs=1&to={$row->email}&su=Your%20Subject&body=Your%20Message";
                        if(Auth::user()->role == 'admin'){
                            return '
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-secondary btn-sm dropdown ps-2 pe-1 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; font-weight: 500; font-size: 14px;">
                                    Action
                                    <i class="ri-arrow-drop-down-fill" style="font-size: 20px;"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="edit">
                                        <button id="btn-detail" data-id="' . $row->id . '" class="dropdown-item"><i class="ri-edit-2-fill align-bottom me-2 text-muted"></i>Detail</button>
                                    </li>
                                    <li class="whatsapp">
                                        <a href="' . $whatsappLink . '" target="_blank" class="dropdown-item"><i class="ri-whatsapp-fill align-bottom me-2 text-success"></i>Send WhatsApp</a>
                                    </li>
                                    <li class="email">
                                        <a href="' . $gmailLink . '" target="_blank" class="dropdown-item"><i class="ri-mail-fill align-bottom me-2 text-primary"></i>Send Email</a>
                                    </li>
                                </ul>
                            </div>';
                        } else {
                        return '
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-secondary btn-sm dropdown ps-2 pe-1 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; font-weight: 500; font-size: 14px;">
                                    Action
                                    <i class="ri-arrow-drop-down-fill" style="font-size: 20px;"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li class="edit">
                                        <button id="btn-detail" data-id="' . $row->id . '" class="dropdown-item"><i class="ri-edit-2-fill align-bottom me-2 text-muted"></i>Detail</button>
                                    </li>
                                </ul>
                            </div>';
                        }
                    })
                    ->rawColumns(['foto_transaksi', 'action', 'status'])
                    ->make(true);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function findDataBookingByID($id)
    {
        $transaksi = DB::table('transaksis')
        ->join('users', 'transaksis.user_id', '=', 'users.id')
        ->join('kosts', 'transaksis.kost_id', '=', 'kosts.id')
        ->select(
            'transaksis.id as id',
            'transaksis.deskripsi',
            'transaksis.foto_transaksi',
            'transaksis.email',
            'transaksis.no_wa',
            'transaksis.status',
            'users.nama_lengkap as user_nama',
            'kosts.nama_kost',
            'kosts.harga',
            'kosts.lokasi',
            'kosts.services',
        )
            ->where('transaksis.id', $id)
            ->first();

        if ($transaksi) {
            return response()->json([
                'success' => true,
                'data' => $transaksi
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan'
            ]);
        }
    }

    public function approve($id)
   {
        try {
            DB::table('transaksis')
            ->where('id', $id)
            ->update(['status' => 'approved']);
            return response()->json(['success' => true, 'message' => 'Berhasil mengupdate user']);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan pada sisi server']);
        }
   }

    public function storeKost(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_kost' => 'required',
                'harga' => 'required',
                'lokasi' => 'required',
                'pemilik' => 'required',
                'kontak_wa' => 'required',
                'kontak_email' => 'required',
                'services' => 'required',
                'deskripsi' => 'required',
            ], [
                'nama_kost.required' => 'Nama kost harus diisi.',
                'harga.required' => 'Harga harus diisi.',
                'lokasi.required' => 'Lokasi harus diisi.',
                'pemilik.required' => 'Pemilik harus diisi.',
                'kontak_wa.required' => 'Kontak WA harus diisi.',
                'services.required' => 'Services harus diisi.',
                'kontak_email.required' => 'Kontak Email harus diisi.',
                'deskripsi.required' => 'Deskripsi Email harus diisi.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'data' => [],
                    'message' => $validator->errors()
                ]);
            }

            $fotoProfilPath = null;
            if ($request->hasFile('gambar')) {
                $fotoProfilPath = $request->file('gambar')->store('images', 'public');
            }

            DB::table('kosts')->insert([
                [
                    'nama_kost' => $request->nama_kost,
                    'harga' => $request->harga,
                    'lokasi' => $request->lokasi,
                    'pemilik' => $request->pemilik,
                    'kontak_wa' => $request->kontak_wa,
                    'kontak_email' => $request->kontak_email,
                    'services' => is_array($request->services) ? implode(',', $request->services) : $request->services,
                    'deskripsi' => $request->deskripsi,
                    'foto_kost' => $fotoProfilPath,
                    'created_at' => Carbon::parse(now())->timezone('Asia/Jakarta'),
                    'updated_at' => Carbon::parse(now())->timezone('Asia/Jakarta'),
                ]
            ]);

            return response()->json([
                'error' => false,
                'data' => [],
                'message' => 'Berhasil mengedit data kost'
            ]);
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    public function editUser(Request $request)
    {
        try {
            $updateData = [
                'id' => $request->id_detail,
                'nama_lengkap' => $request->nama_lengkap_detail,
                'email' => $request->email_detail,
                'no_telepon' => $request->no_telepon_detail,
                'updated_at' => now()->timezone('Asia/Jakarta'),
            ];

            if ($request->has('password_detail')) {
                $updateData['password'] = Hash::make($request->password_detail);
            }
            if ($request->deskripsi_edit) {
                $updateData['detail_barber'] = $request->deskripsi_edit;
            }

            DB::table('users')
            ->where('id', $request->id_detail)
                ->update($updateData);

            return response()->json(['success' => true, 'message' => 'Berhasil mengupdate user']);
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan pada sisi server']);
        }
    }

    public function updateKost(Request $request)
    {
        try {
            $updateData = [
                    'nama_kost' => $request->nama_kost_detail,
                    'harga' => $request->harga_detail,
                    'lokasi' => $request->lokasi_detail,
                    'pemilik' => $request->pemilik_detail,
                    'kontak_wa' => $request->kontak_wa_detail,
                    'kontak_email' => $request->kontak_email_detail,
                    'services' => is_array($request->services_detail) ? implode(',', $request->services_detail) : $request->services_detail,
                    'deskripsi' => $request->deskripsi_detail,
                    'updated_at' => Carbon::parse(now())->timezone('Asia/Jakarta'),
            ];

            if ($request->hasFile('gambar_detail')) {
                $fotoProfilPath = $request->file('gambar_detail')->store('images', 'public');
                $updateData['foto_kost'] = $fotoProfilPath;
            }

            DB::table('kosts')
                ->where('id', $request->id_detail)
                ->update($updateData);


            return response()->json([
                'error' => false,
                'data' => [],
                'message' => 'Berhasil mengedit data kost'
            ]);
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    public function deleteUser($id)
    {
        try {
            $data = DB::table('users')->where('id', $id)->delete();
            if ($data) {
                return response()->json(['success' => true, 'message' => 'Berhasil menghapus data users', 'data' => $data]);
            } else {
                return response()->json(['success' => false, 'message' => 'Gagal menghapus data users']);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan pada sisi server']);
        }
    }

    public function deleteKost($id)
    {
        try {
            $data = DB::table('kosts')->where('id', $id)->delete();
            if ($data) {
                return response()->json(['success' => true, 'message' => 'Berhasil menghapus data kost', 'data' => $data]);
            } else {
                return response()->json(['success' => false, 'message' => 'Gagal menghapus data kost']);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan pada sisi server']);
        }
    }
}
