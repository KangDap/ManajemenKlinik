<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'id_ruangan',
        'tanggal_konsul',
        'jam_konsul',
        'catatan',
    ];
    public function scopeSearch($query, array $filters){

        $query = Konsultasi::query();

        $query->join('pasien', 'konsultasi.id_pasien', '=', 'pasien.id_pasien')
              ->join('dokter', 'konsultasi.id_dokter', '=', 'dokter.id_dokter')
              ->join('ruangan', 'konsultasi.id_ruangan', '=', 'ruangan.id');

        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('pasien.nama', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('dokter.nama', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('ruangan.id', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('konsultasi.tanggal_konsul', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('konsultasi.jam_konsul', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('konsultasi.catatan', 'like', '%' . $filters['search'] . '%');
        }
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class,'id_pasien','id_pasien');
    }

    public function dokter(){
        return $this->belongsTo(Dokter::class,'id_dokter','id_dokter');
    }

    public function ruangan(){
        return $this->belongsTo(Ruangan::class,'id_ruangan','id');
    }
}
