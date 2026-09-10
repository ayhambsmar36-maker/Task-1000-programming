<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Students\StudentsController;
use App\Http\Controllers\Teachers\TeachersController;
use App\Http\Controllers\Classrooms\ClassroomsController;

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

/***********   students   ******************************************************************** */
Route::group(['prefix' => 'students', 'middleware' => ['auth']], function () {
    Route::get('/', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentsController::class, 'create'])->name('students.create');
    Route::get('/{student}', [StudentsController::class, 'show'])->name('students.show');
    Route::post('/', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
    Route::put('/{student}', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
});
/***********   teachers   ******************************************************************** */
Route::group(['prefix' => 'teachers', 'middleware' => ['auth']], function () {
    Route::get('/', [TeachersController::class, 'index'])->name('teachers.index');
    Route::get('/create', [TeachersController::class, 'create'])->name('teachers.create');
    Route::post('/', [TeachersController::class, 'store'])->name('teachers.store');
    Route::get('/{teacher}', [TeachersController::class, 'show'])->name('teachers.show');
    Route::get('/{teacher}/edit', [TeachersController::class, 'edit'])->name('teachers.edit');
    Route::put('/{teacher}', [TeachersController::class, 'update'])->name('teachers.update');
    Route::delete('/{teacher}', [TeachersController::class, 'destroy'])->name('teachers.destroy');
});
/********** classRooms   ******************************************************************** */
Route::group(['prefix' => 'classrooms', 'middleware' => ['auth']], function () {
    Route::get('/', [ClassroomsController::class, 'index'])->name('classrooms.index');
    Route::get('/create', [ClassroomsController::class, 'create'])->name('classrooms.create');
    Route::post('/', [ClassroomsController::class, 'store'])->name('classrooms.store');
    Route::get('/{classroom}', [ClassroomsController::class, 'show'])->name('classrooms.show');
    Route::get('/{classroom}/edit', [ClassroomsController::class, 'edit'])->name('classrooms.edit');
    Route::put('/{classroom}', [ClassroomsController::class, 'update'])->name('classrooms.update');
    Route::delete('/{classroom}', [ClassroomsController::class, 'destroy'])->name('classrooms.destroy');
});
