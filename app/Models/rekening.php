<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekening';
    protected $primaryKey = 'id_rekening';
    public $timestamps = true; 

    protected $fillable = [
        'nama_nasabah',
        'no_rekening',
        'nama_bank',
        'status',
    ];
}
