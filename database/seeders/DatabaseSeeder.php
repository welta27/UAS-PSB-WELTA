<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create(
            [
                'username' => 'Welta27',
                'email' => 'WeltaLiani2704@gmail.com',
                'password' => Hash::make('Welta2704')
            ]
        );

        \App\Models\User::factory()->create(
            [
                'username' => 'Elta1009',
                'email' => 'EltaProject1611@gmail.com',
                'password' => Hash::make('Elta1611')
            ]
        );
    }
}
