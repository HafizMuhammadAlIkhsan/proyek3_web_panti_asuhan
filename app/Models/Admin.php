<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admin';
    protected $primaryKey = 'email_admin';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'email_admin',
        'password_admin',
        'nama_pengurus',
        'jabatan',
        'status_akun'
    ];
    
    protected $hidden = [
        'password_admin',
        'remember_token_admin',
    ];
}
