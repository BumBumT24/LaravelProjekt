<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Teacher; // Dodaj ten import
use App\Models\Subject; // Upewnij się, że masz import klasy Subject

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        // Przykład tworzenia przedmiotów
        for ($i = 0; $i < 1000; $i++) {
            Subject::create([
                'name' => $faker->word,
            ]);
        }
        
        // Dodanie nauczycieli do przedmiotów
        for ($i = 0; $i < 1000; $i++) {
            Teacher::create([
                'name' => $faker->name,
                'surname' => $faker->lastName,
                // Możesz dodać inne dane nauczycieli
            ]);
        }
    }
}