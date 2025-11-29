<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;
    protected $fillable = [
        'class_id',
        'subject_id',
        'teacher_id',
        'day_of_week',
        'period',
    ];

    protected function classes(){
        return $this->belongsTo(classes::class);
    }

    protected function teachers(){
        return $this->belongsTo(teacher::class);
    }

    protected function subjects(){
        return $this->belongsTo(subject::class);
    }
}
