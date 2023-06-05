<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama',
        'alamat',
        'jenis_kelamin',
        'no_telp',
    ];

    protected $table ="ms_pendeta";
}
