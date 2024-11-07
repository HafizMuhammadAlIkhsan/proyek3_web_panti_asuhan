<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    public $timestamps = false;

    protected $fillable = [
        'email_admin',
        'nama_berita',
        'isi_berita',
        'tgl_upload',
        'status',
        'gambar_berita'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'email_admin', 'email_admin');
    }
}
