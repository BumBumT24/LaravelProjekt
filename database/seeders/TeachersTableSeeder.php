<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use Faker\Factory as Faker;

class TeachersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1000; $i++) {
            Teacher::create([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
            ]);
        }
    }
}
