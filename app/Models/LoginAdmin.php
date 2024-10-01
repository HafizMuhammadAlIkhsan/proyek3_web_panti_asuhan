<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class LoginAdmin extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'pengurus'; // Menyebutkan nama tabel yang benar

    protected $fillable = [
        'email_pengurus',
        'password_admin',
    ];

    public function getAuthPassword()
    {
        return $this->password_admin;
    }
}
