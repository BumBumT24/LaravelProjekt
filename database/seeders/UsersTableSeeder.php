<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Tworzenie 500 użytkowników z rolą 'user'
        for ($i = 0; $i < 500; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('qwertyqwerty'),  // Możesz ustawić inne hasło
                'role' => 'user',
            ]);
        }

        // Tworzenie 100 nauczycieli
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('qwertyqwerty'),  // Możesz ustawić inne hasło
                'role' => 'nauczyciel',
            ]);
        }
    }
}
