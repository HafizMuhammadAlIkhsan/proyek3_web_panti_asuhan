<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PantiAsuhan extends Model
{
    use HasFactory;

    protected $table = 'panti_asuhan';
    protected $primaryKey = 'email_panti';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'email_panti',
        'nama_panti',
        'lokasi_panti',
        'nomer_cp',
    ];
}
