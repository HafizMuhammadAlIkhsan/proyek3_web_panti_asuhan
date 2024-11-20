<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiUang extends Model
{
    use HasFactory;

    protected $table = 'donasi_uang';
    protected $primaryKey = 'id_donasi_uang'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 

    protected $fillable = [
        'email_admin',
        'email',
        'jumlah_uang',
        'cara_pembayaran',
        'tanggal_donasi_uang',
        'bukti_transfer',
        'status',
        'id_program',
    ];
}
