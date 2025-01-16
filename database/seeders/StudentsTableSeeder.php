<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1000; $i++) {
            Student::create([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'class_id' => rand(1, 1000),  // Przydzielamy ucznia do losowej klasy
            ]);
        }
    }
}
