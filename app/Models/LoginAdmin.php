<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class LoginAdmin extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'admin';

    protected $fillable = [
        'email_admin',
        'password_admin',
    ];

    public function getAuthPassword()
    {
        return $this->password_admin;
    }
}
