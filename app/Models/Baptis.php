<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baptis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pendeta',
        'id_jemaat',
        'tanggal_baptis',
        
    ];

    protected $table ="baptis";

    public function pendeta(){
        return $this->belongsTo(Pendeta::class, 'id_pendeta','id');
    }

    public function jemaat(){
        return $this->belongsTo(Jemaat::class,'id_jemaat','id');
    }
}
