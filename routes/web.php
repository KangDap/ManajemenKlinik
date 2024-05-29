<?php

use App\Http\Controllers\DashboardKonsultasiController;
use App\Models\Dokter;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get("/konsultasi", [DashboardKonsultasiController::class, "index"]);

Route::resource("/dashboard/konsultasi", DashboardKonsultasiController::class)->middleware('auth');

// Route Login

Route::get("/login", [LoginController::class, "index"])->name('login')->middleware('guest');

Route::post("/login", [LoginController::class, "authenticate"]);

Route::post("/logout", [LoginController::class, "logout"]);

// Route Register User

Route::get("/register", [RegisterController::class, "index"])->middleware('guest');

Route::post("/register", [RegisterController::class, "register"]);

// Route Register Pasien

Route::get("/register-pasien/{user}", [RegisterController::class, 'showRegisterPasien'])->name('registerPasien');

Route::post('/register-pasien/{user}', [RegisterController::class, 'registerPasien']);

// Route Dashboard Pasien

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
