<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Donatur extends Authenticatable
{
    use Notifiable;

    protected $table = 'donatur';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'email',
        'password',
        'kontak',
        'username',
        'tgl_lahir_donatur',
        'pekerjaan',
        'gender'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
