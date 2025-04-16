<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfilController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/get-users', function (Request $request) {
    $id = $request->query('id'); // Ambil ID user dari parameter request

    $users = User::leftJoin('kosts', 'users.id', '=', 'kosts.user_id')
        ->where(function ($query) use ($id) {
            $query->whereNull('kosts.user_id');
            if ($id) {
                $query->orWhere('users.id', $id); // Izinkan user dengan ID tertentu
            }
        })
        ->where('users.role', 'user') // Filter hanya user dengan role 'user'
        ->select('users.id', 'users.nama_lengkap')
        ->get();

    return response()->json($users);
});


Route::get('/contact', function () {
    return view('contact.contact');
})->name('contact');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register-authenticate', 'registerAuthenticate')->name('register-authenticate');
    Route::post('/login-authenticate', 'loginAuthenticate')->name('login-authenticate');
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(PaymentController::class)->group(
    function () {
        Route::post('/store-payment-admin', 'storePaymentAdmin')->name('store-payment-admin');
        Route::post('/store-payment', 'storePayment')->name('store-payment');
        Route::get('/find-data-payment', 'findDataPayment')->name('find-data-payment');
        Route::get('/find-data-payment-id', 'findDataPaymentByID')->name('find-data-payment-id');
        Route::post('/edit-payment', 'updatePayment')->name('edit-payment');
        Route::post('/edit-payment', 'updatePayment')->name('edit-payment');

        //admin
        Route::get('/get-payment-admin/{id}', 'manajemenPayemntview')->name('get-payment-admin');
        Route::get('/find-data-payment-admin', 'findDataPaymentAdmin')->name('find-data-payment-admin');
        Route::get('/approve-payment/{id}', 'updateApprovePayment')->name('approve-payment');
        Route::get('/reject-payment/{id}', 'updateRejectPayment')->name('reject-payment');
    }
);


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(PenggunaController::class)->group(function () {
    Route::post('store-transaksi', 'store')->name('store-transaksi');
});

Route::controller(ProfilController::class)->group(function () {
    Route::get('/profil/{id}', 'index')->name('profil');
    Route::put('/profil-update/{id}', 'update')->name('profil.update');
});

Route::controller(KostController::class)->group(function () {
    Route::get('/kost', 'index')->name('kost');
    Route::get('/detail-kost/{id}', 'detailKost')->name('detail-kost');
});

Route::controller(AdminController::class)->group(function () {
    // manajemen user
    Route::get('/manajemen-user', 'manajemenUser')->name('manajemen-user');
    Route::get('/find-data-user', 'findDataUser')->name('find-data-user');
    Route::get('/find-data-user-id', 'findDataUserByID')->name('find-data-user-id');
    Route::post('/edit-user', 'editUser')->name('edit-user');
    Route::delete('/delete-user/{id}', 'deleteUser')->name('delete-user');

    // manajemen kost
    Route::get('/manajemen-kost', 'manajemenKost')->name('manajemen-kost');
    Route::get('/find-data-kost', 'findDataKost')->name('find-data-kost');
    Route::get('/find-data-kost-id', 'findDataKostByID')->name('find-data-kost-id');
    Route::post('/store-kost', 'storeKost')->name('store-kost');
    Route::post('/edit-kost', 'updateKost')->name('edit-kost');
    Route::delete('/delete-kost/{id}', 'deleteKost')->name('delete-kost');

    //manajemen booking
    Route::get('manajemen-booking', 'manajemenBookings')->name('manajemen-booking');
    Route::get('find-data-booking', 'findDataBooking')->name('find-data-booking');
    Route::get('find-data-booking-id/{id}', 'findDataBookingByID')->name('find-data-booking-id');
    Route::post('approve/{id}', 'approve')->name('approve');
});
