<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Donatur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'donatur'; // Nama tabel di database

    protected $primaryKey = 'email'; // Set primary key sebagai email

    public $incrementing = false; // Karena primary key bukan integer

    protected $keyType = 'string'; // Tipe primary key adalah string

    protected $fillable = [
        'email', 'username', 'password', 'tgl_lahir_donatur', 'kontak', 'pekerjaan', 'gender', 'kota',
    ];

    protected $hidden = [
        'password',
    ];
}
