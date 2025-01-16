<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->timestamps();
        });
        DB::table('teachers')->insert([
            ['name' => 'John', 'surname' => 'Doe'],
            ['name' => 'Jane', 'surname' => 'Smith'],
            ['name' => 'Robert', 'surname' => 'Johnson'],
            ['name' => 'Emily', 'surname' => 'Williams'],
            ['name' => 'Michael', 'surname' => 'Brown'],
            ['name' => 'Linda', 'surname' => 'Davis'],
            ['name' => 'David', 'surname' => 'Miller'],
            ['name' => 'Sarah', 'surname' => 'Wilson'],
            ['name' => 'James', 'surname' => 'Moore'],
            ['name' => 'Karen', 'surname' => 'Taylor'],
            ['name' => 'Chris', 'surname' => 'Anderson'],
            ['name' => 'Patricia', 'surname' => 'Thomas'],
            ['name' => 'Joseph', 'surname' => 'Jackson'],
            ['name' => 'Betty', 'surname' => 'White'],
            ['name' => 'Charles', 'surname' => 'Harris'],
            ['name' => 'Margaret', 'surname' => 'Martin'],
            ['name' => 'Thomas', 'surname' => 'Garcia'],
            ['name' => 'Barbara', 'surname' => 'Rodriguez'],
            ['name' => 'Paul', 'surname' => 'Lee'],
            ['name' => 'Laura', 'surname' => 'Walker'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
