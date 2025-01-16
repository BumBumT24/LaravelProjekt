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
        Schema::create('teacher_subjects', function (Blueprint $table) {
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->timestamps();
        });
        DB::table('teacher_subjects')->insert([
            ['teacher_id' => 1, 'subject_id' => 1],
            ['teacher_id' => 1, 'subject_id' => 2],
            ['teacher_id' => 1, 'subject_id' => 3],
            ['teacher_id' => 2, 'subject_id' => 1],
            ['teacher_id' => 2, 'subject_id' => 4],
            ['teacher_id' => 3, 'subject_id' => 2],
            ['teacher_id' => 3, 'subject_id' => 5],
            ['teacher_id' => 4, 'subject_id' => 6],
            ['teacher_id' => 5, 'subject_id' => 7],
            ['teacher_id' => 5, 'subject_id' => 3],
            ['teacher_id' => 6, 'subject_id' => 1],
            ['teacher_id' => 6, 'subject_id' => 4],
            ['teacher_id' => 7, 'subject_id' => 5],
            ['teacher_id' => 8, 'subject_id' => 2],
            ['teacher_id' => 8, 'subject_id' => 7],
            ['teacher_id' => 9, 'subject_id' => 6],
            ['teacher_id' => 10, 'subject_id' => 4],
            ['teacher_id' => 10, 'subject_id' => 3],
            ['teacher_id' => 11, 'subject_id' => 5],
            ['teacher_id' => 12, 'subject_id' => 2],
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_subject');
    }
};
