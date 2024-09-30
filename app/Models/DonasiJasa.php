<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiJasa extends Model
{
    protected $table = 'donasi_jasa';
    protected $primaryKey = 'ID_DONASI_JASA';
    public $incrementing = true; // Pastikan incrementing aktif
    protected $fillable = ['EMAIL_PENGURUS', 'NAMA_JASA', 'JADWAL_MULAI', 'JADWAL_SELESAI', 'DURASI_JASA'];
}

