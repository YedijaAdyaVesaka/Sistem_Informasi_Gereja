<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
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
        'golongan_jemaat',
    ];

    protected $table ="ms_jemaat";
}
