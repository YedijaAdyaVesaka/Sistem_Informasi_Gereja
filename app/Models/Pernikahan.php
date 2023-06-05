<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pernikahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pendeta',
        'id_jemaat_pria',
        'id_jemaat_wanita',
        'tanggal_pernikahan',

    ];

    protected $table ="pernikahan";

    // protected $primaryKey = 'id_jemaat';

    public function pendeta(){
        return $this->belongsTo(Pendeta::class, 'id_pendeta','id');
    }

    public function jemaat_pria(){
        return $this->belongsTo(Jemaat::class,'id_jemaat_pria', 'id');
    }

    public function jemaat_wanita(){
        return $this->belongsTo(Jemaat::class,'id_jemaat_wanita', 'id');
    }
    
}
