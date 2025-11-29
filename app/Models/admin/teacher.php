<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'phone',
    ];

    protected function classes(){
        return $this->hasMany(classes::class);
    }

    protected function schedules(){
        return $this->hasMany(schedule::class);
    }
}
