<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Konsultasi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'konsultasi';
    protected $dates = ['tanggal_konsul'];
    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'id_ruangan',
        'tanggal_konsul',
        'jam_konsul',
        'catatan',
        'status'
    ];

    public function formattedDate(){
        return Carbon::parse($this->tanggal_konsul)->translatedFormat('d F Y');
    }
    public function formattedTime(){
        return Carbon::parse($this->jam_konsul)->translatedFormat('H:i');
    }
    public function scopeSearch($query, array $filters){

        $query->join('pasien', 'konsultasi.id_pasien', '=', 'pasien.id_pasien')
              ->join('dokter', 'konsultasi.id_dokter', '=', 'dokter.id_dokter')
              ->join('ruangan', 'konsultasi.id_ruangan', '=', 'ruangan.id')
              ->select('konsultasi.*', 'ruangan.id as ruangan_id');

        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('pasien.nama', 'like', '%' . $search . '%')
                  ->orWhere('dokter.nama', 'like', '%' . $search . '%')
                  ->orWhere('ruangan.id', 'like', '%' . $search . '%')
                  ->orWhere('konsultasi.tanggal_konsul', 'like', '%' . $search . '%')
                  ->orWhere('konsultasi.jam_konsul', 'like', '%' . $search . '%')
                  ->orWhere('konsultasi.catatan', 'like', '%' . $search . '%')
                  ->orWhere('konsultasi.status', 'like', '%' . $search . '%');
            });
        }

        return $query;
    }
    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    public function dokter(){
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'id_ruangan', 'id');
    }
}
