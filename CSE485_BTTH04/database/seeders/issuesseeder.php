<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class issuesseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computerIds = DB::table('computers')->pluck('id')->toArray();
        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerIds),
                'reported_by' => $faker->name(),
                'reported_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'description' => $faker->paragraph(),
                'urgency' => $faker->randomElement(['low', 'medium', 'high']),
                'status' => $faker->randomElement(['open', 'in_progress', 'resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
