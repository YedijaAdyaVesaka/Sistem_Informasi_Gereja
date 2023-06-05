<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebaktian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pendeta',
        'id_majelis',
        'nama',
        'tempat',
        'tanggal',
        
    ];

    protected $table ="kebaktian";

    public function pendeta(){
        return $this->belongsTo(Pendeta::class, 'id_pendeta','id');
    }

    public function majelis(){
        return $this->belongsTo(Majelis::class,'id_majelis','id');
    }
}
