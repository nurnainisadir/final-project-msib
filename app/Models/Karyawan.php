<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    //mapping ke kolom
    protected $fillable = ['kode_karyawan','nama_karyawan','no_tlp','alamat','gender','foto'];

    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}