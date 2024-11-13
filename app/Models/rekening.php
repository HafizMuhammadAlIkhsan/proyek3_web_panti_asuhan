<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekening';
    protected $primaryKey = 'id_rekening';
    public $timestamps = false;

    protected $fillable = [
        'email_panti',
        'no_rekening',
        'nama_bank',
    ];

    public function pantiAsuhan()
    {
        return $this->belongsTo(PantiAsuhan::class, 'email_panti', 'email_panti');
    }
}
