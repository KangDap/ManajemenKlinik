<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Ruangan;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardKonsultasiController extends Controller
{
    public function index(Request $request){
        Carbon::setLocale("id");

        $user = Auth::user();
        $nama = '';

        if ($user->userHasRole('dokter')) {
            $dokter = auth()->user()->dokter;
            $nama = $user->dokter->nama;
            $list_konsultasi = Konsultasi::where('konsultasi.id_dokter', $dokter->id_dokter)
            ->search($request->only('search'))
            ->get();

            return view("konsultasi-dokter", [
                'title' => 'Konsultasi Saya',
                'list_konsultasi' => $list_konsultasi,
                'nama' => $nama
            ]);
        }
        else {
            $pasien = auth()->user()->pasien;
            $nama = $user->pasien->nama;
            $list_konsultasi = Konsultasi::where('konsultasi.id_pasien', $pasien->id_pasien)
            ->search($request->only('search'))
            ->get();

            return view("konsultasi", [
                'title' => 'Konsultasi Saya',
                'list_konsultasi' => $list_konsultasi,
                'nama' => $nama
            ]);
        }
    }

    public function create(){
        $user = Auth::user();
        $nama = $user->pasien->nama;

        return view('create', [
            'title'=> 'Buat Konsultasi',
            'list_dokter' => Dokter::all(),
            'list_ruangan' => Ruangan::all(),
            'nama' => $nama
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'dokter' => 'required',
            'ruangan' => 'required',
            'tanggal_konsul' => 'required',
            'jam_konsul' => 'required',
            'catatan' => 'required'
        ]);

        $existingKonsultasi = Konsultasi::where('id_ruangan', $validatedData['ruangan'])
                                        ->where('jam_konsul', $validatedData['jam_konsul'])
                                        ->whereDate('tanggal_konsul', $validatedData['tanggal_konsul'])
                                        ->exists();

        if ($existingKonsultasi) {
            return redirect()->back()->with('error', 'Konsultasi pada jam dan ruangan tersebut sudah ada.');
        }

        $existingKonsultasiDokter = Konsultasi::where('id_dokter', $validatedData['dokter'])
                                              ->where('jam_konsul', $validatedData['jam_konsul'])
                                              ->whereDate('tanggal_konsul', $validatedData['tanggal_konsul'])
                                              ->exists();

        if ($existingKonsultasiDokter) {
            return redirect()->back()->with('error', 'Dokter sudah memiliki konsultasi pada jam tersebut.');
        }

        $konsultasi = new Konsultasi();
        $konsultasi->id_pasien = auth()->user()->pasien->id_pasien;
        $konsultasi->id_dokter = $validatedData['dokter'];
        $konsultasi->id_ruangan = $validatedData['ruangan'];
        $konsultasi->tanggal_konsul = $validatedData['tanggal_konsul'];
        $konsultasi->jam_konsul = $validatedData['jam_konsul'];
        $konsultasi->catatan = $validatedData['catatan'];
        $konsultasi->save();

        return redirect('/konsultasi')->with('success', 'Konsultasi berhasil dipesan');
    }

    public function destroy(Konsultasi $konsultasi){
        Konsultasi::destroy($konsultasi->id);

        return redirect('/konsultasi')->with('success', 'Konsultasi berhasil dibatalkan');
    }

    public function show(Konsultasi $konsultasi){
        $user = Auth::user();

        if($user->userHasRole('dokter')){
            $nama = $user->dokter->nama;

            return view('edit', [
                'title' => 'Edit Konsultasi',
                'konsultasi' => $konsultasi,
                'list_dokter' => Dokter::all(),
                'list_ruangan' => Ruangan::all(),
                'nama' => $nama
            ]);
        }

        else{
            $nama = $user->pasien->nama;

            return view('edit', [
                'title' => 'Edit Konsultasi',
                'konsultasi' => $konsultasi,
                'list_dokter' => Dokter::all(),
                'list_ruangan' => Ruangan::all(),
                'nama' => $nama
            ]);
        }
    }

    public function update(Request $request, Konsultasi $konsultasi){
        $validatedData = $request->validate([
            'id_dokter' => 'required',
            'id_ruangan' => 'required',
            'tanggal_konsul' => 'required',
            'jam_konsul' => 'required',
            'catatan' => 'required'
        ]);

        $validatedData['status'] = 'Menunggu';

        Konsultasi::where('id', $konsultasi->id)
            ->update($validatedData);

        return redirect('/konsultasi')->with('success', 'Konsultasi berhasil diupdate');
    }

    public function changeStatus(Request $request, Konsultasi $konsultasi){
        $validatedData = $request->validate([
            'status' => 'required|in:Diterima,Ditolak'
        ]);

        $konsultasi->update(['status' => $validatedData['status'],]);

        return redirect('/konsultasi')->with('success', 'Status konsultasi berhasil diubah');
    }
}
