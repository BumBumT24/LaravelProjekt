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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('classes')->insert([
            ['name' => 'Klasa 1A'],
            ['name' => 'Klasa 1B'],
            ['name' => 'Klasa 2A'],
            ['name' => 'Klasa 2B'],
            ['name' => 'Klasa 3A'],
            ['name' => 'Klasa 3B'],
            ['name' => 'Klasa 4A'],
            ['name' => 'Klasa 4B'],
            ['name' => 'Klasa 5A'],
            ['name' => 'Klasa 5B'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
