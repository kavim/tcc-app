<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [AdminController::class, 'index'])->name('admin.index');
Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');

