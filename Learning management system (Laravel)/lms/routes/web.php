<?php

use App\Http\Controllers\SolutionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});
Route::get('/contact', function (User $user) {
    return view('contact');
});

Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.list')->middleware('auth');

Route::get('/subjects/{id}/show', [SubjectController::class, 'show'])->name('subjects.show')->middleware('auth');

Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create')->middleware('auth');
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store')->middleware('auth');

Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit')->middleware('auth');
Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subjects.update')->middleware('auth');

Route::delete('/subjects/{id}', [SubjectController::class, 'delete'])->name('subjects.delete')->middleware('auth');


Route::resource('subjects.tasks', TaskController::class)->shallow()->middleware('auth');

Route::resource('tasks.solutions', SolutionController::class)->shallow()->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
