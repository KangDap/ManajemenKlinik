<?php

use App\Http\Controllers\KonsultasiController;
use App\Models\Dokter;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title'=> 'About',
        "clinicname" => "RoDaZa Clinic",
        "desc"=> "Layanan konsultasi kesehatan terpercaya",
        "address"=> "Jl. Raya Bandung Sumedang KM.21, Hegarmanah, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45365",
        "email"=> "rodazaclinic@gmail.com"
    ]);
});

Route::get('/dokter', function () {
    return view('dokter', [
        'title'=> 'Dokter',
        'list_dokter'=> Dokter::all()
    ]);
});

// Page masing-masing dokter

Route::get('/dokter/{info_dokter:slug}', function (Dokter $info_dokter) {
    // $info_dokter = Dokter::find( $id_dokter );

    return view('biodokter', [
        'title'=> $info_dokter["name"],
        "infodokter" => $info_dokter
    ]);
});

Route::get("/konsultasi", [KonsultasiController::class, "index"]);
