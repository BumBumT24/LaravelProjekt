<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ocena;
use Faker\Factory as Faker;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Student;

class OcenyTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generowanie 1000 ocen
        for ($i = 0; $i < 1000; $i++) {
            Ocena::create([
                'teacher_id' => Teacher::inRandomOrder()->first()->id, // Losowy nauczyciel
                'subject_id' => Subject::inRandomOrder()->first()->id, // Losowy przedmiot
                'student_id' => Student::inRandomOrder()->first()->id, // Losowy uczeń
                'ocena' => $faker->numberBetween(2, 5), // Losowa ocena w zakresie 2-5
            ]);
        }
    }
}
