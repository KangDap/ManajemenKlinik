<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = "pasien";
    protected $primaryKey = 'id_pasien';
    public $incrementing = false;
    protected $keyType = 'char';
    protected $fillable = [
        'id_pasien',
        'nama',
        'slug',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
        'email',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function konsultasi(){
        return $this->hasMany(Konsultasi::class,'id_pasien','id_pasien');
    }
}
