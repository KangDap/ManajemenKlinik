<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangan';
    protected $fillable = [
        'lantai',
        'jenis_ruangan',
        'luas',
        'status',
    ];

    public function konsultasi(){
        return $this->hasMany(Konsultasi::class,'id_ruangan','id');
    }
}
