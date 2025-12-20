<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class computerseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            DB::table('computers')->insert([
                'computer_name' => 'Lab' . $faker->numberBetween(1, 5) . '-PC' . $faker->numberBetween(1, 50),
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre']),
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'Ubuntu 20.04', 'macOS Monterey']),
                'processor' => $faker->randomElement(['Intel i5', 'Intel i7', 'AMD Ryzen 5', 'AMD Ryzen 7']),
                'memory' => $faker->randomElement([8, 16, 32, 64]),
                'available' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
