<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use App\Http\Resources\TransaksiResource;
use DB;
use Illuminate\Support\Facades\Validator;


class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::join('customer', 'idcustomer', 'customer_id')
        ->join('jenis', 'idjenis', 'jenis_id')
        ->join('users', 'id', 'users_id')
        ->select('nama_customer', 'jenis_laundry', 'berat', 'tgl_awal', 
                 'tgl_ambil', 'total_bayar', 'status', 'name')
        ->get();

        return new TransaksiResource(true, 'Data Transaksi',$transaksi);
    }

    public function show($id)
    {
        $transaksi = Transaksi::join('customer', 'idcustomer', 'customer_id')
        ->join('jenis', 'idjenis', 'jenis_id')
        ->join('users', 'id', 'users_id')
        ->select('nama_customer', 'jenis_laundry', 'berat', 'tgl_awal', 
                 'tgl_ambil', 'total_bayar', 'status', 'name')
        ->where('idtransaksi', '=', $id)         
        ->get();

        return new TransaksiResource(true, 'Detail Data Transaksi',$transaksi);
    }

    public function store(Request $request)
    {
        //proses input Transaksi
        $validator = Validator::make($request->all(),[
            'customer_id' => 'required|integer',
            'jenis_id' => 'required|integer',
            'berat' => 'required|integer',
            'tgl_awal' => 'required',
            //'tgl_ambil' => 'required',
            //'total_bayar' => 'required|integer',
            //'status' => 'required',
            'users_id' => 'required|integer',
        ]);

        //cek error atau tidak inputan data
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        //proses menyimpan data yg diinput
        $transaksi=Transaksi::create([
            'customer_id'=>$request->customer_id,
            'jenis_id'=>$request->jenis_id,
            'berat'=>$request->berat,
            'tgl_awal'=>$request->tgl_awal,
            'tgl_ambil'=>$request->tgl_ambil,
            'total_bayar'=>$request->total_bayar,
            'users_id'=>$request->users_id
        ]);
        
        return new TransaksiResource(true, 'Data Transaksi Berhasil diinput',$transaksi);

    }

    public function update(Request $request, $id)
    {
         //proses ubah Transaksi
         $validator = Validator::make($request->all(),[
            'customer_id' => 'required|integer',
            'jenis_id' => 'required|integer',
            'berat' => 'required|integer',
            'tgl_awal' => 'required',
            //'tgl_ambil' => 'required',
            //'total_bayar' => 'required|integer',
            'status' => 'required',
            'users_id' => 'required|integer',
        ]);

        //cek error atau tidak inputan data
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

         //proses menyimpan data yg diinput
         $transaksi = Transaksi::where('idtransaksi',$id)->update([
            'customer_id'=>$request->customer_id,
            'jenis_id'=>$request->jenis_id,
            'berat'=>$request->berat,
            'tgl_awal'=>$request->tgl_awal,
            'tgl_ambil'=>$request->tgl_ambil,
            'total_bayar'=>$request->total_bayar,
            'status'=>$request->status,
            'users_id'=>$request->users_id,
        ]);

        return new TransaksiResource(true, 'Data Transaksi Berhasil diubah',$transaksi);              

    }

    public function destroy($id)
    {
        $transaksi = Transaksi::where('idtransaksi',$id)->first();
        $transaksi->delete();
       
        return new TransaksiResource(true, 'Data Transaksi Berhasil dihapus',$transaksi); 
    }
}
