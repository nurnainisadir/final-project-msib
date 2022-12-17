<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    //mapping ke tabel
    protected $table ='jenis';
    protected $primaryKey = 'idjenis';
    //mapping ke kolom
    protected $fillable = ['jenis_laundry','harga'];

    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
