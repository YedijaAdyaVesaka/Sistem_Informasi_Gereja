<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jadwal',
        'id_majelis',
        
    ]; 

    protected $table ="pelayan";

    public function jadwal(){
        return $this->belongsTo(Jadwalibadah::class, 'id_jadwal','id');
    }

    public function majelis(){
        return $this->belongsTo(Majelis::class,'id_majelis','id');
    }
}
