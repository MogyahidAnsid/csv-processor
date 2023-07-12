<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProspectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            \App\Models\Prospect::create([
                'first_name' => fake()->unique()->firstName(),
                'last_name' => fake()->unique()->lastName(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->unique()->phoneNumber(),
                'company' => fake()->unique()->company(),
            ]);
        }
    }
}
