<?php

namespace Database\Factories;

use App\Models\Ruangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruangan>
 */
class RuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ruangan::class;
    public function definition(): array
    {
        return [
            'lantai' => fake()->numberBetween(1, 3),
            'jenis_ruangan' => fake()->word(),
            'luas'=> fake()->randomFloat(2, 50, 250),
            'status' => 'tersedia'
        ];
    }
}
