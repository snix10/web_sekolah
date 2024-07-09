<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StafGuru>
 */
class StafGuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'jabatan' => $this->faker->randomElement(['Kepala Sekolah', 'Guru', 'Staf IT']),
            'mapel' => $this->faker->randomElement(['IPA', 'IPS', 'IT','B.INDONESIA','B.INGGRIS']),
            
        ];
    }
}
