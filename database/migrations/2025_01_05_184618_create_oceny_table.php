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
        Schema::create('oceny', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->integer('ocena');
            $table->timestamps();
        });
        DB::table('oceny')->insert([
            ['teacher_id' => 1, 'subject_id' => 1,'student_id' => 1, 'ocena' => 3],
            ['teacher_id' => 1, 'subject_id' => 2,'student_id' => 2, 'ocena' => 2],
            ['teacher_id' => 1, 'subject_id' => 3,'student_id' => 3, 'ocena' => 3],
            ['teacher_id' => 2, 'subject_id' => 1,'student_id' => 1, 'ocena' => 4],
            ['teacher_id' => 2, 'subject_id' => 4,'student_id' => 4, 'ocena' => 3],
            ['teacher_id' => 3, 'subject_id' => 2,'student_id' => 7, 'ocena' => 5],
            ['teacher_id' => 3, 'subject_id' => 5,'student_id' => 2, 'ocena' => 3],
            ['teacher_id' => 4, 'subject_id' => 6,'student_id' => 8, 'ocena' => 5],
            ['teacher_id' => 5, 'subject_id' => 7,'student_id' => 8, 'ocena' => 5],
            ['teacher_id' => 5, 'subject_id' => 3,'student_id' => 9, 'ocena' => 3],
            ['teacher_id' => 6, 'subject_id' => 1,'student_id' => 4, 'ocena' => 2],
            ['teacher_id' => 6, 'subject_id' => 4,'student_id' => 5, 'ocena' => 2],
            ['teacher_id' => 7, 'subject_id' => 5,'student_id' => 10, 'ocena' => 2],
            ['teacher_id' => 8, 'subject_id' => 2,'student_id' => 13, 'ocena' => 3],
            ['teacher_id' => 8, 'subject_id' => 7,'student_id' => 15, 'ocena' => 4],
            ['teacher_id' => 9, 'subject_id' => 6,'student_id' => 13, 'ocena' => 4],
            ['teacher_id' => 10, 'subject_id' => 4,'student_id' => 14, 'ocena' => 3],
            ['teacher_id' => 10, 'subject_id' => 3,'student_id' => 11, 'ocena' => 4],
            ['teacher_id' => 11, 'subject_id' => 5,'student_id' => 12, 'ocena' => 3],
            ['teacher_id' => 12, 'subject_id' => 2,'student_id' => 18, 'ocena' => 2],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oceny');
    }
};
