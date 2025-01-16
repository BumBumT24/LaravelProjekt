<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassModel;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'class_id'
    ];

    public function studentClass()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
    public function oceny()
    {
        return $this->hasMany(Ocena::class);
    }
}
