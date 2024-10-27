<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'donatur';
    protected $primaryKey = 'email_admin';

    protected $fillable = [
        'email_admin',
        'password_admin',
        'nama_pengurus',
        'jabatan',
    ];
    
    protected $hidden = [
        'password_admin',
        'remember_token_admin',
    ];
}
