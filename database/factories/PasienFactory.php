<?php

namespace Database\Factories;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pasien::class;
    private static $sequence = 1;
    public function definition(): array
    {
        $name = $this->faker->name();
        $slug = Str::slug($name);
        $phone = '08' . $this->faker->numerify('##########');
        $email = User::where('role', 'pasien')->pluck('email')->random();

        return [
            'id_pasien' => 'P' . str_pad(self::$sequence++, 4, '0', STR_PAD_LEFT),
            'nama'=> $name,
            'slug'=> $slug,
            'tanggal_lahir' => fake()->date(),
            'alamat' => fake()->address(),
            'no_telepon'=> $phone,
            'email'=> $email,
        ];
    }
}
