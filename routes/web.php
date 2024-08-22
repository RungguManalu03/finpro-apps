<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

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

Route::get('/contact', function() {
    return view('contact.contact');
})->name('contact');

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register-authenticate', 'registerAuthenticate')->name('register-authenticate');
    Route::post('/login-authenticate', 'loginAuthenticate')->name('login-authenticate');
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('home');
});

Route::controller(ProfilController::class)->group(function() {
    Route::get('/profil/{id}', 'index')->name('profil');
    Route::put('/profil-update/{id}', 'update')->name('profil.update');
});

Route::controller(KostController::class)->group(function() {
    Route::get('/kost', 'index')->name('kost');
    Route::get('/detail-kost/{id}', 'detailKost')->name('detail-kost');
});

Route::controller(AdminController::class)->group(function() {
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
});
