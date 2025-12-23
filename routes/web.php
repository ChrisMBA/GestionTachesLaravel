<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', fn() => redirect()->route('tasks.index'));

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::patch('/tasks/{task}/done', [TaskController::class, 'markDone'])->name('tasks.done');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
