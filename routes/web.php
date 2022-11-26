<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;

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
    
    Route::resource('jenis',JenisController::class);
    Route::resource('customer',CustomerController::class);
    Route::resource('karyawan',KaryawanController::class);
    Route::resource('transaksi',TransaksiController::class);
    Route::get('transaksi-edit/{idtransaksi}', [TransaksiController::class,'edit']);
    Route::get('jenis-edit/{idjenis}', [JenisController::class,'edit']);
    Route::get('customer-edit/{idcustomer}', [CustomerController::class,'edit']);
    Route::get('karyawan-edit/{idkaryawan}', [KaryawanController::class,'edit']);
    //Route::delete('customer/{id}', [CustomerController::class, 'delete']);
    Route::get('customer-pdf', [CustomerController::class,'customerPDF']);
    Route::get('karyawan-pdf', [KaryawanController::class,'karyawanPDF']);
    Route::get('jenis-pdf', [JenisController::class,'jenisPDF']);
    Route::get('transaksi-pdf', [TransaksiController::class,'transaksiPDF']);
    Route::get('transaksi-excel', [TransaksiController::class,'transaksiExcel']);
    Route::get('dashboard', [DashboardController::class,'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');