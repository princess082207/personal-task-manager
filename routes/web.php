<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// 1. Root link automatically points to your task dashboard list page
Route::get('/', [TaskController::class, 'index']);

// 2. Main Task Management CRUD URL mappings
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// 3. Custom patch route that exactly matches your Blade view name definitions
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleStatus'])->name('tasks.updateStatus');
