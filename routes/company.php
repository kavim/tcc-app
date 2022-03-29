<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Editor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Editor" middleware group. Now create something great!
|
*/

Route::get('/home', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');

Route::get('/edit', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
Route::post('/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');

Route::get('/post/show', [App\Http\Controllers\CompanyController::class, 'postIndex'])->name('company.post.index');
Route::get('/post/edit/{id}', [App\Http\Controllers\CompanyController::class, 'postEdit'])->name('company.post.edit');
Route::post('/post/update/{id}', [App\Http\Controllers\CompanyController::class, 'postUpdate'])->name('company.post.update');
