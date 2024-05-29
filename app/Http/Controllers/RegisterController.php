<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pasien;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view("register", [
            'title' => 'Register'
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $user = User::create($validatedData);

        return redirect()->route('registerPasien', ['user' => $user->id])->with('success', 'Registrasi berhasil, silakan isi data diri anda.');
    }

    public function showRegisterPasien(User $user){
        return view('register-pasien', [
            'title' => 'Register',
            'user' => $user
        ]);
    }

    public function registerPasien(Request $request, User $user){
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|max:255',
            'no_telepon' => 'required|string|max:12'
        ]);

        $slug = Str::slug($validatedData['nama']);

        $originalSlug = $slug;
        $count = 1;
        while (Pasien::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $pasien = new Pasien();
        $pasien->id_pasien = 'P' . Str::padLeft((Pasien::count() + 1), 4, '0');
        $pasien->nama = $validatedData['nama'];
        $pasien->slug = $slug;
        $pasien->tanggal_lahir = $validatedData['tanggal_lahir'];
        $pasien->alamat = $validatedData['alamat'];
        $pasien->no_telepon = $validatedData['no_telepon'];
        $pasien->email = $user->email;
        $pasien->save();

        return redirect('/login');
    }
}
