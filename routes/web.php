<?php

use App\Http\Controllers\DashboardKonsultasiController;
use App\Models\Dokter;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'list_dokter'=> Dokter::all()
    ]);
});

// Route Konsultasi

Route::resource("/konsultasi", DashboardKonsultasiController::class)->middleware('auth');

Route::post('/konsultasi/{konsultasi}/change-status', [DashboardKonsultasiController::class, 'changeStatus'])->name('konsultasi.changeStatus')->middleware('auth');

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
