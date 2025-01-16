<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeacherSubject;

class TeacherSubjectTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 1000; $i++) {
            TeacherSubject::create([
                'teacher_id' => rand(1, 1000),
                'subject_id' => rand(1, 1000),
            ]);
        } 
    }
}