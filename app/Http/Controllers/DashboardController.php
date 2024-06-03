<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $nama = '';

        if ($user->userHasRole('dokter')) {
            $nama = $user->dokter->nama;

            return view("dokter", [
                'title' => 'Home',
                'list_dokter' => Dokter::all(),
                'nama' => $nama
            ]);
        } else {
            $nama = $user->pasien->nama;

            return view("dashboard", [
                'title' => 'Home',
                'list_dokter' => Dokter::all(),
                'nama' => $nama
            ]);
        }
    }
}
