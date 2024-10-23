<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAnak extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_anak';
    protected $keyType = 'integer';
    protected $table = 'data_anak';

    protected $fillable = [
        'nama_anak',
        'jenis_kelamin',
        'pendidikan',
        'status_ortu',
        'tanggal_lahir',
    ];

}
