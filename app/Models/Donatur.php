<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Donatur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'donatur';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
        'nama_asli',
        'kontak',
        'username',
        'tgl_lahir_donatur',
        'pekerjaan',
        'gender',
        'kota'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
