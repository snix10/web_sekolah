<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestasi>
 */
class PrestasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kejuaraan' => $this->faker->randomElement(['olimpiade', 'Event', 'Pemenrintah','Masyarakat']),
            'keterangan' => $this->faker->randomElement(['Juara 1', 'Juara 2', 'Penghargaan']),
            'sumber' => $this->faker->randomElement(['Dalam Sekolah', 'LuarSekolah', 'IT']),
        ];
    }
}
