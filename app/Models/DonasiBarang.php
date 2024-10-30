<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_barang',
        'jumlah',
        'status',
        'tanggal',
        'bukti_foto'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}