<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('layout.app');
});

Route::resource('/dashboard', dashboard::class);

Route::get('/classes', [ClassesController::class, 'index']
)->name('classes.index');

Route::get('/teacher', [TeacherController::class, 'index']
)->name('teacher.index');
