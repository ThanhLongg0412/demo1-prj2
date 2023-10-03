<?php

use App\Http\Controllers\AA\AAController;
use App\Http\Controllers\AA\AaStudentController;
use App\Http\Controllers\AA\ClassController;
use App\Http\Controllers\AA\MajorController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/student/home', [StudentController::class, 'home'])->name('student-home');

Route::get('/academic_affairs/home', [AAController::class, 'home'])->name('aa-home');



Route::get('/academic_affairs/majors', [MajorController::class, 'index'])->name('aa-major');

Route::post('/academic_affairs/majors', [MajorController::class, 'createMajor'])->name('aa-major-create');

Route::post('/academic_affairs/majors/delete', [MajorController::class, 'deleteMajorById'])->name('aa-major-delete');

Route::post('/academic_affairs/majors/update', [MajorController::class, 'updateMajorById'])->name('aa-major-update');

Route::get('/academic_affairs/majors/edit', [MajorController::class, 'edit'])->name('aa-major-edit');



Route::get('/academic_affairs/classes', [ClassController::class, 'index'])->name('aa-class');

Route::post('/academic_affairs/classes/create', [ClassController::class, 'createClass'])->name('aa-class-create');

Route::post('/academic_affairs/classes/delete', [ClassController::class, 'deleteClassById'])->name('aa-class-delete');

Route::post('/academic_affairs/classes/update', [ClassController::class, 'updateClassById'])->name('aa-class-update');

Route::get('/academic_affairs/classes/edit', [ClassController::class, 'edit'])->name('aa-class-edit');



Route::get('/academic_affairs/students', [AaStudentController::class, 'index'])->name('aa-student');

Route::post('/academic_affairs/students',[AaStudentController::class, 'createStudent'])->name('aa-student-create');

Route::post('/academic_affairs/student/delete', [AaStudentController::class, 'deleteStudentById'])->name('aa-student-delete');

Route::post('/academic_affairs/students/update', [AaStudentController::class, 'updateStudentById'])->name('aa-student-update');

Route::get('/academic_affairs/students/edit', [AaStudentController::class, 'edit'])->name('aa-student-edit');
