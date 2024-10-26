<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiJasa extends Model
{
    use HasFactory;

    protected $table = 'donasi_jasa';

    protected $fillable = [
        'email_pengurus',
        'nama_jasa',
        'jadwal_mulai',
        'jadwal_selesai',
    ];
}


