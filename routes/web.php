<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/notes', [App\Http\Controllers\NoteController::class, 'index'])->name('notes.index');;
Route::get('/notes/create', [App\Http\Controllers\NoteController::class, 'create'])->name('notes.create');;
Route::post('/notes', [App\Http\Controllers\NoteController::class, 'store'])->name('notes.store');
Route::delete('/notes/{id}/delete', [App\Http\Controllers\NoteController::class, 'destroy'])->name('notes.destroy');
Route::get('notes/{id}/edit', [App\Http\Controllers\NoteController::class, 'edit'])->name('notes.edit');
Route::post('notes/{id}/update', [App\Http\Controllers\NoteController::class, 'update'])->name('notes.update');