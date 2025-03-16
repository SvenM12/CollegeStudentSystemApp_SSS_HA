<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

//Route returns a list of colleges
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');

//Route that allows the user to create a new college entry
Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');

//Route that shows the college edit form
Route::get('/colleges/edit/{id}', [CollegeController::class, 'edit'])->name('colleges.edit');

//Route that updates a college entry
Route::get('/colleges/{id}', [CollegeController::class, 'update'])->name('colleges.update');

//Route that shows a specific college details
Route::get('/colleges/show/{id}', [CollegeController::class, 'show'])->name('colleges.show');

// route that will store the contents of a new contact
Route::post('/colleges', [CollegeController::class, 'store'])->name('colleges.store');

//Route that will delete a specific college entry
Route::get('/college/{id}', [CollegeController::class, 'destroy'])->name('colleges.destroy');

//Route that returns a list of students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

//Route that allows the user to create a new student entry
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

//Route that shows the student edit form
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');

//Route that shows a specific student details
Route::get('/students/show/{id}', [StudentController::class, 'show'])->name('students.show');

//Route that will delete a specific student
Route::get('/students/{id}', [StudentController::class, 'destory'])->name('students.destroy');