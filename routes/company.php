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

Route::get('/', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');

Route::get('/edit', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
Route::post('/update/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');

Route::get('/posts', [App\Http\Controllers\CompanyController::class, 'postsIndex'])->name('company.posts.index');
// Route::get('/posts/show/{id}', [App\Http\Controllers\CompanyController::class, 'postsShow'])->name('company.posts.show');
Route::get('/posts/create', [App\Http\Controllers\CompanyController::class, 'postsCreate'])->name('company.posts.create');
Route::get('/posts/edit/{id}', [App\Http\Controllers\CompanyController::class, 'postsEdit'])->name('company.posts.edit');
Route::post('/posts/update/{id}', [App\Http\Controllers\CompanyController::class, 'postsUpdate'])->name('company.posts.update');
Route::post('/posts/store', [App\Http\Controllers\CompanyController::class, 'postsStore'])->name('company.posts.store');
// Route::delete('/posts/delete/{id}', [App\Http\Controllers\CompanyController::class, 'postsUpdate'])->name('company.posts.update');
