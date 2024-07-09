<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash; 
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        \App\Models\StafGuru::factory(50)->create();

        // stafguru::factory(1)->create([
        //     'nama' => 'gatot',
        //     'jabatan' => 'kepala sekolah',
        //     'mapel' => '',

        // ]);

        // stafguru::factory(1)->create([
        //     'nama' => 'friz',
        //     'jabatan' => 'guru',
        //     'mapel' => 'IPS ',

        // ]);
    }
}
