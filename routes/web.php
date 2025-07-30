<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('components.layouts.homepage');
})->name('home');

// Route::get('/course', function () {
//     return view('components.layouts.course');
// })->name('course');

Route::get('/course', [CourseController::class, 'index'])->name('course');
Route::get('/course/create-course', [CourseController::class, 'singleCourse'])->name('single_course');
Route::post('/course/store-course', [CourseController::class, 'create'])->name('storeCourse');