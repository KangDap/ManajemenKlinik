<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Dokter extends Model{
    use HasFactory;
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    public $incrementing = false;
    protected $keyType = 'char';
    protected $fillable = [
        'id_dokter',
        'nama',
        'slug',
        'spesialis',
        'no_telepon',
        'email',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function konsultasi(){
        return $this->hasMany(Konsultasi::class,'id_dokter','id_dokter');
    }
}
