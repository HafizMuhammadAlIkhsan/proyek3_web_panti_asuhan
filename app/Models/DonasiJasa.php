<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiJasa extends Model
{
    use HasFactory;

    protected $table = 'donasi_jasa';
    public $timestamps = True;
    protected $primaryKey = 'id_donasi_jasa';

    protected $fillable = [
        'email_admin',
        'email',
        'nama_jasa',
        'deskripsi_jasa',
        'jadwal_mulai',
        'jadwal_selesai',
    ];
    // Relasi ke Donatur
    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'email', 'email');
    }
    
    // Relasi ke Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'email_admin', 'email_admin');
    }
}
