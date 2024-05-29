<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;

class DashboardKonsultasiController extends Controller
{
    public function index(){
        return view("konsultasi",[
            'title' => 'Konsultasi',
            'list_konsultasi' => Konsultasi::search(request(['search']))->get()
        ]);
    }
}
