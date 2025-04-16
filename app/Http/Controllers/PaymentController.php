<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    function manajemenPayemntview($id)
    {
        $idKost = $id;
        $namaKost = DB::table('kosts')
            ->where('id', $idKost)
            ->value('nama_kost');
        return view('admin.payment-admin', compact('idKost', 'namaKost'));
    }
    public function storePayment(Request $request)
    {
        // try {
        $validator = Validator::make($request->all(), [
            'bulan' => 'required',
            'tahun' => 'required',
        ], [
            'bulan.required' => 'Bulan Pembayaran kost harus diisi.',
            'tahun.required' => 'Tahun Pembayaran Kost harus diisi.',
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
        $userId = Auth::id();
        $kostId = DB::table('kosts')
            ->where('user_id', $userId)
            ->value('id'); // Ambil satu nilai saja

        if (!$kostId) {
            return response()->json(['error' => 'Kost tidak ditemukan untuk user ini'], 404);
        }

        DB::table('payment_kosts')->insert([
            [
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'user_id' => $userId,
                'kost_id' => $kostId, // Sekarang dalam format integer, bukan array
                'bukti_pembayaran' => $fotoProfilPath,
                'status' => 'Pending',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta'),
            ]
        ]);


        return response()->json([
            'error' => false,
            'data' => [],
            'message' => 'Berhasil mengedit data kost'
        ]);
        // } catch (Throwable $e) {
        //     Log::error($e->getMessage());

        //     return response()->json(['success' => false, 'message' => $e]);
        // }
    }
    public function storePaymentAdmin(Request $request)
    {
        // try {
        $validator = Validator::make($request->all(), [
            'bulan' => 'required',
            'tahun' => 'required',
        ], [
            'bulan.required' => 'Bulan Pembayaran kost harus diisi.',
            'tahun.required' => 'Tahun Pembayaran Kost harus diisi.',
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
        $kostId = $request->payment_id;
        $userId = DB::table('kosts')
            ->where('id', $kostId)
            ->value('id');


        DB::table('payment_kosts')->insert([
            [
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'user_id' => $userId,
                'kost_id' => $kostId, // Sekarang dalam format integer, bukan array
                'bukti_pembayaran' => $fotoProfilPath,
                'status' => 'Approve',
                'created_at' => Carbon::now('Asia/Jakarta'),
                'updated_at' => Carbon::now('Asia/Jakarta'),
            ]
        ]);


        return response()->json([
            'error' => false,
            'data' => [],
            'message' => 'Berhasil mengedit data kost'
        ]);
        // } catch (Throwable $e) {
        //     Log::error($e->getMessage());

        //     return response()->json(['success' => false, 'message' => $e]);
        // }
    }

    // function findDataPayment(Request $request)
    // {
    //     try {
    //         $months = [
    //             '01' => 'Januari',
    //             '02' => 'Februari',
    //             '03' => 'Maret',
    //             '04' => 'April',
    //             '05' => 'Mei',
    //             '06' => 'Juni',
    //             '07' => 'Juli',
    //             '08' => 'Agustus',
    //             '09' => 'September',
    //             '10' => 'Oktober',
    //             '11' => 'November',
    //             '12' => 'Desember'
    //         ];

    //         $subQuery = DB::table('payment_kosts')
    //             ->select('id', 'bulan', 'tahun', 'bukti_pembayaran', 'kost_id', 'user_id', 'status')
    //             ->where('user_id', Auth::id());
    //         if ($request->has('search') && !empty($request->search['value'])) {
    //             $searchUser = $request->search['value'];
    //             $subQuery->where(function ($query) use ($searchUser) {
    //                 $query->where('bulan', 'LIKE', '%' . $searchUser . '%')
    //                     ->orWhere('tahun', 'LIKE', '%' . $searchUser . '%');
    //             });
    //         }

    //         $subQuery->orderBy('tahun', 'desc')->orderBy('bulan', 'desc');


    //         $queryUser = DB::table(DB::raw("({$subQuery->toSql()}) as tmp"))
    //             ->mergeBindings($subQuery)
    //             ->select('*')
    //             ->get();

    //         if ($request->ajax()) {
    //             return DataTables::of($queryUser)
    //                 ->addIndexColumn()
    //                 ->addColumn('bulan', function ($row) {
    //                     return $row->bulan;
    //                 })
    //                 ->addColumn('tahun', function ($row) {
    //                     return $row->tahun;
    //                 })
    //                 ->addColumn('status', function ($row) {
    //                     // Tentukan warna berdasarkan status
    //                     $badgeColor = match (strtolower($row->status)) {
    //                         'pending' => 'warning', // Orange
    //                         'approve' => 'success', // Green
    //                         'reject' => 'danger',   // Red
    //                         default => 'secondary'  // Grey (default jika tidak ada status)
    //                     };

    //                     return '<span class="badge bg-' . $badgeColor . '">' . ucfirst($row->status) . '</span>';
    //                 })
    //                 ->addColumn('gambar', function ($row) {
    //                     $fotoProfilPath = $row->bukti_pembayaran
    //                         ? asset('storage/' . $row->bukti_pembayaran)
    //                         : asset('storage/images/default.jpg');

    //                     return '<img src="' . $fotoProfilPath . '" alt="Bukti Pembayaran" width="50" height="50" style="border-radius: 50%; cursor: pointer;"
    //     onclick="showImageModal(\'' . $fotoProfilPath . '\')">';
    //                 })


    //                 ->addColumn('action', function ($row) {
    //                     $html_code =
    //                         '<div class="dropdown d-inline-block">
    //                         <button class="btn btn-soft-secondary btn-sm dropdown ps-2 pe-1 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; align-items: center; font-weight: 500; font-size: 14px;">
    //                             Action
    //                             <i class="ri-arrow-drop-down-fill" style="font-size: 20px;"></i>
    //                         </button>
    //                         <ul class="dropdown-menu dropdown-menu-end">
    //                             <li class="edit">
    //                                 <button id="btn-detail" data-id="' . $row->id . '" class="dropdown-item"><i class="ri-edit-2-fill align-bottom me-2 text-muted"></i>Edit</button>
    //                             </li>
    //                             <li class="delete"><button data-id="' . $row->id . '" id="btn-delete" class="dropdown-item remove-item-btn text-danger"><i class="ri-delete-bin-fill align-bottom me-2"></i> Hapus</button></li>
    //                         </ul>
    //                     </div>';
    //                     return $html_code;
    //                 })
    //                 ->rawColumns(['gambar', 'action', 'status'])
    //                 ->make(true);
    //         }
    //     } catch (Throwable $e) {
    //         Log::error($e->getMessage());

    //         return response()->json(['success' => false, 'message' => $e]);
    //     }
    // }

    function findDataPayment(Request $request)
    {
        try {
            // Array konversi bulan dari angka ke nama
            $months = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];

            $subQuery = DB::table('payment_kosts')
                ->select('id', 'bulan', 'tahun', 'bukti_pembayaran', 'kost_id', 'user_id', 'status')
                ->where('user_id', Auth::id());
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchUser = strtolower($request->search['value']);

                // Find month number for both exact and partial matches
                $monthNumber = null;
                foreach ($months as $num => $monthName) {
                    if (str_contains(strtolower($monthName), $searchUser)) {
                        $monthNumber = $num;
                        break;
                    }
                }

                $subQuery->where(function ($query) use ($searchUser, $monthNumber) {
                    if ($monthNumber) {
                        $query->where('bulan', $monthNumber);
                    } else {
                        // If no month match found, try searching by year
                        $query->where('tahun', 'LIKE', '%' . $searchUser . '%');
                    }
                });
            }

            $subQuery->orderBy('tahun', 'desc')->orderBy('bulan', 'desc');

            $queryUser = DB::table(DB::raw("({$subQuery->toSql()}) as tmp"))
                ->mergeBindings($subQuery)
                ->select('*')
                ->get();

            if ($request->ajax()) {
                return DataTables::of($queryUser)
                    ->addIndexColumn()
                    ->addColumn('bulan', function ($row) use ($months) {
                        return $months[$row->bulan] ?? $row->bulan;
                    })
                    ->addColumn('tahun', function ($row) {
                        return $row->tahun;
                    })
                    ->addColumn('status', function ($row) {
                        $badgeColor = match (strtolower($row->status)) {
                            'pending' => 'warning',
                            'approve' => 'success',
                            'reject' => 'danger',
                            default => 'secondary'
                        };
                        return '<span class="badge bg-' . $badgeColor . '">' . ucfirst($row->status) . '</span>';
                    })
                    ->addColumn('gambar', function ($row) {
                        $fotoProfilPath = $row->bukti_pembayaran
                            ? asset('storage/' . $row->bukti_pembayaran)
                            : asset('storage/images/default.jpg');
                        return '<img src="' . $fotoProfilPath . '" alt="Bukti Pembayaran" width="50" height="50" style="border-radius: 50%; cursor: pointer;"
                    onclick="showImageModal(\'' . $fotoProfilPath . '\')">';
                    })
                    ->addColumn('action', function ($row) {
                        return '<div class="dropdown d-inline-block">
                        <button class="btn btn-soft-secondary btn-sm dropdown ps-2 pe-1 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Action <i class="ri-arrow-drop-down-fill" style="font-size: 20px;"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="edit">
                                <button id="btn-detail" data-id="' . $row->id . '" class="dropdown-item">
                                    <i class="ri-edit-2-fill align-bottom me-2 text-muted"></i>Edit
                                </button>
                            </li>
                            <li class="delete">
                                <button data-id="' . $row->id . '" id="btn-delete" class="dropdown-item remove-item-btn text-danger">
                                    <i class="ri-delete-bin-fill align-bottom me-2"></i> Hapus
                                </button>
                            </li>
                        </ul>
                    </div>';
                    })
                    ->rawColumns(['gambar', 'action', 'status'])
                    ->make(true);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    function findDataPaymentAdmin(Request $request)
    {
        // dd($request->kost_id);
        try {
            // Array konversi bulan dari angka ke nama
            $months = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];

            $subQuery = DB::table('payment_kosts')
                ->select('id', 'bulan', 'tahun', 'bukti_pembayaran', 'kost_id', 'user_id', 'status')
                ->where('kost_id', $request->kost_id);
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchUser = strtolower($request->search['value']);

                // Find month number for both exact and partial matches
                $monthNumber = null;
                foreach ($months as $num => $monthName) {
                    if (str_contains(strtolower($monthName), $searchUser)) {
                        $monthNumber = $num;
                        break;
                    }
                }

                $subQuery->where(function ($query) use ($searchUser, $monthNumber) {
                    if ($monthNumber) {
                        $query->where('bulan', $monthNumber);
                    } else {
                        // If no month match found, try searching by year
                        $query->where('tahun', 'LIKE', '%' . $searchUser . '%');
                    }
                });
            }

            $subQuery->orderBy('tahun', 'desc')->orderBy('bulan', 'desc');

            $queryUser = DB::table(DB::raw("({$subQuery->toSql()}) as tmp"))
                ->mergeBindings($subQuery)
                ->select('*')
                ->get();

            if ($request->ajax()) {
                return DataTables::of($queryUser)
                    ->addIndexColumn()
                    ->addColumn('bulan', function ($row) use ($months) {
                        return $months[$row->bulan] ?? $row->bulan;
                    })
                    ->addColumn('tahun', function ($row) {
                        return $row->tahun;
                    })
                    ->addColumn('status', function ($row) {
                        $badgeColor = match (strtolower($row->status)) {
                            'pending' => 'warning',
                            'approve' => 'success',
                            'reject' => 'danger',
                            default => 'secondary'
                        };
                        return '<span class="badge bg-' . $badgeColor . '">' . ucfirst($row->status) . '</span>';
                    })
                    ->addColumn('gambar', function ($row) {
                        $fotoProfilPath = $row->bukti_pembayaran
                            ? asset('storage/' . $row->bukti_pembayaran)
                            : asset('storage/images/default.jpg');
                        return '<img src="' . $fotoProfilPath . '" alt="Bukti Pembayaran" width="50" height="50" style="border-radius: 50%; cursor: pointer;"
                    onclick="showImageModal(\'' . $fotoProfilPath . '\')">';
                    })
                    // ->addColumn('action', function ($row) {
                    //     return '<div class="dropdown d-inline-block">
                    //     <button class="btn btn-soft-secondary btn-sm dropdown ps-2 pe-1 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    //         Action <i class="ri-arrow-drop-down-fill" style="font-size: 20px;"></i>
                    //     </button>
                    //     <ul class="dropdown-menu dropdown-menu-end">
                    //         <li class="delete">
                    //             <button data-id="' . $row->id . '" id="btn-delete" class="dropdown-item remove-item-btn text-danger">
                    //                 <i class="ri-delete-bin-fill align-bottom me-2"></i> Hapus
                    //             </button>
                    //         </li>
                    //     </ul>
                    // </div>';
                    // })
                    ->addColumn('action', function ($row) {
                        return '<div class="dropdown d-inline-block">
                <button class="btn btn-soft-secondary btn-sm dropdown ps-2 pe-1 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Action <i class="ri-arrow-drop-down-fill" style="font-size: 20px;"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <button data-id="' . $row->id . '" class="dropdown-item btn-approve text-success">
                            <i class="ri-check-fill align-bottom me-2"></i> Approve
                        </button>
                    </li>
                    <li>
                        <button data-id="' . $row->id . '" class="dropdown-item btn-reject text-warning">
                            <i class="ri-close-fill align-bottom me-2"></i> Reject
                        </button>
                    </li>
                    <li class="delete">
                        <button data-id="' . $row->id . '" class="dropdown-item remove-item-btn text-danger">
                            <i class="ri-delete-bin-fill align-bottom me-2"></i> Hapus
                        </button>
                    </li>
                </ul>
            </div>';
                    })

                    ->rawColumns(['gambar', 'action', 'status'])
                    ->make(true);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    public function findDataPaymentByID(Request $request)
    {
        try {
            $data = DB::table('payment_kosts')
                ->select('payment_kosts.id', 'payment_kosts.bulan', 'payment_kosts.tahun',)
                ->where('payment_kosts.id', $request->id)
                ->first();
            if ($data) {
                return response()->json([
                    $data->id,
                    $data->bulan,
                    $data->tahun,
                ]);
            } else {
                return response()->json(['success' => false, 'message' => 'Terjadi Kesalahan']);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function updatePayment(Request $request)
    {
        // try {
        $updateData = [
            'bulan' => $request->bulan_detail,
            'tahun' => $request->tahun_detail,
            'updated_at' => Carbon::parse(now())->timezone('Asia/Jakarta'),
        ];


        if ($request->hasFile('gambar_detail')) {
            $fotoProfilPath = $request->file('gambar_detail')->store('images', 'public');
            $updateData['bukti_pembayaran'] = $fotoProfilPath;
        }

        DB::table('payment_kosts')
            ->where('id', $request->id_detail)
            ->update($updateData);

        return response()->json([
            'error' => false,
            'data' => [],
            'message' => 'Berhasil mengedit data kost'
        ]);
        // } catch (Throwable $e) {
        //     Log::error($e->getMessage());

        //     return response()->json(['success' => false, 'message' => $e]);
        // }
    }

    public function updateApprovePayment($id)
    {
        // try {
        $updateData = [
            'status' => 'Approve',
            'updated_at' => Carbon::parse(now())->timezone('Asia/Jakarta'),
        ];


        DB::table('payment_kosts')
            ->where('id', $id)
            ->update($updateData);

        return response()->json([
            'error' => false,
            'data' => [],
            'message' => 'Berhasil mengedit data kost'
        ]);
    }
    public function updateRejectPayment($id)
    {
        // try {
        $updateData = [
            'status' => 'Reject ',
            'updated_at' => Carbon::parse(now())->timezone('Asia/Jakarta'),
        ];


        DB::table('payment_kosts')
            ->where('id', $id)
            ->update($updateData);

        return response()->json([
            'error' => false,
            'data' => [],
            'message' => 'Berhasil mengedit data kost'
        ]);
    }
}
