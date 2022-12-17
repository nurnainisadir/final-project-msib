<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table ='customer';
    protected $primaryKey = 'idcustomer';
    //mapping ke kolom
    protected $fillable = ['nama_customer','no_tlp','gender','alamat'];

    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
