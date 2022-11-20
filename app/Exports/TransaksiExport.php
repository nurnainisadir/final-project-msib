<?php

namespace App\Exports;
use DB;
use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Transaksi::all();
        $ar_transaksi = DB::table('transaksi')
        ->join('customer', 'idcustomer', 'customer_id')
        ->join('jenis', 'idjenis', 'jenis_id')
        ->join('karyawan', 'idkaryawan', 'karyawan_id')
        ->select('nama_customer', 'jenis_laundry', 'berat', 'tgl_awal', 
                 'tgl_ambil', 'total_bayar', 'nama_karyawan')
        ->get();
        return $ar_transaksi; 
    }

    public function headings(): array

    {
        return ["Nama Customer", "Jenis Laundry", "Berat", "Tanggal Awal", "Tanggal Akhir", "Total Bayar", "Nama Karyawan"];
    }
}
