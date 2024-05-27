<?php

namespace Database\Factories;

use App\Models\Konsultasi;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Konsultasi>
 */
class KonsultasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Konsultasi::class;
    public function definition(): array
    {
        $id_pasien = DB::table('pasien')->pluck('id_pasien')->random();
        $id_dokter = DB::table('dokter')->pluck('id_dokter')->random();
        $id_ruangan = DB::table('ruangan')->pluck('id')->random();

        return [
            'id_pasien' => $id_pasien,
            'id_dokter' => $id_dokter,
            'id_ruangan' => $id_ruangan,
            'tanggal_konsul' => fake()->date(),
            'jam_konsul' => fake()->time(),
            'catatan' => fake()->text()
        ];
    }
}
