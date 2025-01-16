<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname'
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects');
    }
    public function oceny()
    {
        return $this->hasMany(Ocena::class);
    }
}