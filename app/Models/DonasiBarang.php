<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiBarang extends Model
{
    protected $table = 'donasi_barang';
    protected $primaryKey = 'id_donasi_barang';
    public $timestamps = true;

    protected $fillable = [
        'email_admin',
        'email',
        'nama_barang',
        'jumlah_barang',
        'tanggal_verifikasi_barang',
        'bukti_foto',
        'status',
        'metode_pengiriman'
    ];

    protected $casts = [
        'tanggal_verifikasi_barang' => 'date',
        'jumlah_barang' => 'integer'
    ];

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'email', 'email');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'email_admin', 'email_admin');
    }
}