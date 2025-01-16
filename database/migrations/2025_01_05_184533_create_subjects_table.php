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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('subjects')->insert([
            ['name' => 'Matematyka'],
            ['name' => 'Fizyka'],
            ['name' => 'Chemia'],
            ['name' => 'Biologia'],
            ['name' => 'Język polski'],
            ['name' => 'Język angielski'],
            ['name' => 'Historia'],
            ['name' => 'Geografia'],
            ['name' => 'Informatyka'],
            ['name' => 'Wiedza o społeczeństwie'],
            ['name' => 'Wychowanie fizyczne'],
            ['name' => 'Plastyka'],
            ['name' => 'Muzyka'],
            ['name' => 'Religia'],
            ['name' => 'Technika'],
            ['name' => 'Przyroda'],
            ['name' => 'Edukacja matematyczna'],
            ['name' => 'Informatyka'],
            ['name' => 'Zajęcia wychowawcze'],
            ['name' => 'Język niemiecki'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
