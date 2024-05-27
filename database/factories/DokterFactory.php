<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    protected $model = Dokter::class;
    private static $sequence = 1;
    public function definition(): array
    {

        $name = $this->faker->name();
        $slug = Str::slug($name);
        $phone = '08' . $this->faker->numerify('##########');
        $email = User::where('role', 'dokter')->pluck('email')->random();

        return [
            'id_dokter' => 'D' . str_pad(self::$sequence++, 4, '0', STR_PAD_LEFT),
            'nama' => $name,
            'slug' => $slug,
            'spesialis' => $this->faker->word(),
            'no_telepon' => $phone,
            'email' => $email
        ];
    }
}
