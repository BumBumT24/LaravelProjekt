<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            TeachersTableSeeder::class, 
            ClassesTableSeeder::class, 
            SubjectsTableSeeder::class, 
            StudentsTableSeeder::class,
            TeacherSubjectTableSeeder::class,
            OcenaTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}