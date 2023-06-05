<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renungan extends Model

{
    use HasFactory;

    protected $fillable = [
        'id_pendeta',
        'judul',
        'bacaan',
        'isi_renungan',
        'tanggal',
    ];

    protected $table ="ms_renungan";

}
