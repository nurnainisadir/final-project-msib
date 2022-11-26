<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $ar_harga = DB::table('jenis')->select('jenis_laundry','harga')->get();
        $ar_gender = DB::table('customer')
                ->selectRaw('gender, count(gender) as jumlah')
                ->groupBy('gender')
                ->get();
        return view('dashboard.index', compact('ar_harga', 'ar_gender'));
    }
}
