<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiJasa extends Model
{
    use HasFactory;

    protected $table = 'donasi_jasa';

    protected $fillable = [
        'email_admin',
        'email',
        'nama_jasa',
        'deskripsi_jasa',
        'jadwal_mulai',
        'jadwal_selesai',
    ];

    public $timestamps = false;
    protected $primaryKey = 'id_donasi_jasa';
}
