<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassModel;
use Faker\Factory as Faker;

class ClassesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1000; $i++) {
            ClassModel::create([
                'name' => 'Klasa ' . $faker->word,
            ]);
        }
    }
}

