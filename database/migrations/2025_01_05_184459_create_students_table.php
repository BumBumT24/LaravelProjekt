<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->timestamps();  // created_at i updated_at będą automatycznie dodane
        });

        // Wstawianie danych z określoną datą dla created_at i updated_at
        DB::table('students')->insert([
            ['name' => 'Adam', 'surname' => 'Nowak', 'class_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ewa', 'surname' => 'Kowalska', 'class_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Piotr', 'surname' => 'Wiśniewski', 'class_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Anna', 'surname' => 'Wójcik', 'class_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tomasz', 'surname' => 'Lewandowski', 'class_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Maria', 'surname' => 'Zielińska', 'class_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Krzysztof', 'surname' => 'Dąbrowski', 'class_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Natalia', 'surname' => 'Kowalczyk', 'class_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Michał', 'surname' => 'Szymański', 'class_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Joanna', 'surname' => 'Jankowska', 'class_id' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Paweł', 'surname' => 'Woźniak', 'class_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Zofia', 'surname' => 'Kamińska', 'class_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jakub', 'surname' => 'Pawlak', 'class_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Iwona', 'surname' => 'Adamczak', 'class_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Szymon', 'surname' => 'Kaczmarek', 'class_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Karolina', 'surname' => 'Marek', 'class_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Grzegorz', 'surname' => 'Zawisza', 'class_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Agnieszka', 'surname' => 'Nowicka', 'class_id' => 8, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

