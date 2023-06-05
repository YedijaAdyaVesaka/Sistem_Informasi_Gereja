<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalibadah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pendeta',
        'id_majelis',
        'nama',
        'tempat',
        'tanggal',
        'bacaan',
        
    ];

    protected $table ="jadwal_ibadah";

    public function pendeta(){
        return $this->belongsTo(Pendeta::class, 'id_pendeta','id');
    }

    public function majelis(){
        return $this->belongsTo(Majelis::class,'id_majelis','id');
    }
}
