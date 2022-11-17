<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
     protected $table ='transaksi';
    //mapping ke kolom
    protected $fillable = ['customer_id','jenis_id','berat','tgl_awal','tgl_ambil','total_bayar','karyawan_id'];

    public function customer()
    {
    	return $this->belongsTo(Customer::class,'customer_id','idcustomer');
    }

    public function jenis()
    {
    	return $this->belongsTo(Jenis::class,'jenis_id','idjenis');
    }

    public function karyawan()
    {
    	return $this->belongsTo(Karyawan::class,'karyawan_id','idkaryawan');
    }
}