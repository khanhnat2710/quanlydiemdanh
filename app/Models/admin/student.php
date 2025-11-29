<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    protected $fillable = [
        'full_name',
        'gender',
        'birthday',
        'class_id',
        'status',
    ];

    protected function classes(){
        return $this->belongsTo(classes::class);
    }
}
