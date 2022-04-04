<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [AdminController::class, 'index'])->name('admin.index');

Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/users/show/{user}', [UserController::class, 'show'])->name('admin.users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::post('/users/update', [UserController::class, 'edit'])->name('admin.users.update');
Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::get('/users/{id}', [UserController::class, 'verifyStudent'])->name('admin.users.verify');

//company
Route::get('/companies', [CompanyController::class, 'index'])->name('admin.companies.index');
Route::get('/companies/show/{id}', [CompanyController::class, 'show'])->name('admin.companies.show');
Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('admin.companies.edit');
Route::post('/companies/update', [CompanyController::class, 'update'])->name('admin.companies.update');
Route::get('/companies/create', [CompanyController::class, 'create'])->name('admin.companies.create');
Route::post('/companies/store', [CompanyController::class, 'store'])->name('admin.companies.store');
Route::get('/companies/{id}', [CompanyController::class, 'verifyCompany'])->name('admin.companies.verify');

//posts
Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::post('/posts/update/{id}', [PostController::class, 'update'])->name('admin.posts.update');
Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('admin.posts.store');
