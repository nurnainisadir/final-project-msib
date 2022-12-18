<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Auth::routes();
Route::get('/', function () {
    return view('landingpage.home');
});
Route::get('/home', function () {
    return view('landingpage.home');
});
Route::get('/about', function () {
    return view('landingpage.about');
});
Route::get('/contact', function () {
    return view('landingpage.contact');
});
Route::middleware('auth')->group(function(){
    Route::get('/administrator', function () {
        return view('admin.home');
    });
    Route::get('/kelola_user', function () {
        return view('admin.home');
    });
    Route::get('/access_denied', function () {
        return view('admin.access_denied');
    });
    
    Route::resource('jenis',JenisController::class);
    Route::resource('customer',CustomerController::class);
    //Route::resource('karyawan',KaryawanController::class);
    //Route::get('ajax/karyawan/{karyawan:idkaryawan}', [KaryawanController::class, 'showAjax']);
    Route::resource('transaksi',TransaksiController::class);
    Route::get('ajax/transaksi/{transaksi:idtransaksi}', [TransaksiController::class, 'showAjax']);
    Route::resource('users',UserController::class);
    Route::get('transaksi-edit/{idtransaksi}', [TransaksiController::class,'edit']);
    Route::get('jenis-edit/{idjenis}', [JenisController::class,'edit']);
    Route::get('customer-edit/{idcustomer}', [CustomerController::class,'edit']);
    //Route::get('karyawan-edit/{idkaryawan}', [KaryawanController::class,'edit']);
    Route::get('users-edit/{id}', [UserController::class,'edit']);
    Route::get('customer-pdf', [CustomerController::class,'customerPDF']);
    //Route::get('karyawan-pdf', [KaryawanController::class,'karyawanPDF']);
    Route::get('jenis-pdf', [JenisController::class,'jenisPDF']);
    Route::get('transaksi-pdf', [TransaksiController::class,'transaksiPDF']);
    Route::get('unduh-pdf/{idtransaksi}', [TransaksiController::class,'unduhPDF']);
    Route::get('transaksi-excel', [TransaksiController::class,'transaksiExcel']);
    Route::get('dashboard', [DashboardController::class,'index']);
    Route::get('after_register', [RegisterController::class,'index']);

    Route::get('profil',[UserController::class,'profil'])->name('profil');
    Route::get('edit-profil',[UserController::class,'editprofil'])->name('edit-profil');
    Route::put('update-profil/{id}',[UserController::class,'updateprofil'])->name('update-profil');
    
    Route::get('ubah-password',[ProfilController::class,'ubahpassword'])->name('ubah-password');
    Route::post('ubah-password',[ProfilController::class,'ubahpasswordproses'])->name('ubah-password-proses');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/after_register', function () {
    return view('landingpage.after_register');
});
