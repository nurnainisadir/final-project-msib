<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Customer;
use App\Models\Jenis;
use App\Models\Karyawan;
use DB;
use PDF;
use Alert;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampilkan seluruh data
        $transaksi = Transaksi::orderBy('idtransaksi', 'ASC')->get();
        return view('transaksi.index',compact('transaksi'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ar_customer = Customer::all();
        $ar_jenis = Jenis::all();
        $ar_karyawan = Karyawan::all();
        //arahkan ke form input data
        return view('transaksi.form',compact('ar_customer','ar_jenis','ar_karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'customer_id' => 'required|integer',
            'jenis_id' => 'required|integer',
            'berat' => 'required|integer',
            'tgl_awal' => 'required',
            'tgl_ambil' => 'required',
            'total_bayar' => 'required|integer',
            'karyawan_id' => 'required|integer',
        ]);

        
        DB::table('transaksi')->insert(
            [
                'customer_id'=>$request->customer_id,
                'jenis_id'=>$request->jenis_id,
                'berat'=>$request->berat,
                'tgl_awal'=>$request->tgl_awal,
                'tgl_ambil'=>$request->tgl_ambil,
                'total_bayar'=>$request->total_bayar,
                'karyawan_id'=>$request->karyawan_id,
                'created_at'=>now(),
            ]);
       
        return redirect()->route('transaksi.index')
                        ->with('success','Data Transaksi Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Transaksi::where('idtransaksi',$id)->first();
        return view('transaksi.form_edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|integer',
            'jenis_id' => 'required|integer',
            'berat' => 'required|integer',
            'tgl_awal' => 'required',
            'tgl_ambil' => 'required',
            'total_bayar' => 'required|integer',
            'karyawan_id' => 'required|integer',
        ]);

        DB::table('transaksi')->where('idtransaksi',$id)->update(
            [
                'customer_id'=>$request->customer_id,
                'jenis_id'=>$request->jenis_id,
                'berat'=>$request->berat,
                'tgl_awal'=>$request->tgl_awal,
                'tgl_ambil'=>$request->tgl_ambil,
                'total_bayar'=>$request->total_bayar,
                'karyawan_id'=>$request->karyawan_id,
                'created_at'=>now(),
            ]); 
       
        return redirect()->route('transaksi.index')
                        ->with('success','Data Transaksi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Transaksi::where($id);
        Transaksi::where('idtransaksi',$id)->delete();
        return redirect()->route('transaksi.index')
                        ->with('success','Data Transaksi Berhasil Dihapus');
    }

   

    public function transaksiPDF()
    {
        $transaksi = Transaksi::all();
        $pdf = PDF::loadView('transaksi.transaksiPDF', ['transaksi'=>$transaksi]);
        return $pdf->download('transaksi.pdf');
    }

    public function transaksiExcel() 
    {
        return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    }
}
