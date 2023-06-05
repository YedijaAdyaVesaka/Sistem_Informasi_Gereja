<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Majelis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama',
        'alamat',
        'jenis_kelamin',
        'no_telp',
        'nama_ayah',
        'nama_ibu',
    ];

    protected $table = "ms_majelis";
}
