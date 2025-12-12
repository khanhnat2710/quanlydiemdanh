<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    /** @use HasFactory<\Database\Factories\ClassesFactory> */
    use HasFactory;
    protected $fillable = [
        'class_name',
        'grade',
        'number_of_students',
        'homeroom_teacher_id',
    ];

    protected function teacher(){
        return $this->belongsTo(teacher::class);
    }
}
