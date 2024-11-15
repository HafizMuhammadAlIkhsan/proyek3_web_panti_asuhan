<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPanti extends Model
{
    use HasFactory;

    protected $table = 'program_panti';
    protected $primaryKey = 'nama_program';
    public $timestamps = false;

    protected $fillable = [
        'email_admin',
        'nama_program',
        'deskripsi_program',
        'tgl_upload',
        'status',
        'dana_program',
        'gambar_program'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'email_admin', 'email_admin');
    }
}

