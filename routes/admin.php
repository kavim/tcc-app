<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PlaceCategoryController;
use App\Http\Controllers\PlaceSubcategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ReunionController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/users', [UserController::class, 'admin_index'])->name('admin.users');
Route::get('/users/create', [UserController::class, 'admin_create'])->name('admin.users.create');
Route::post('/users/store', [UserController::class, 'admin_store'])->name('admin.users.store');
Route::get('/users/edit/{user}', [UserController::class, 'admin_edit'])->name('admin.users.edit');
Route::put('/users/update/{user}', [UserController::class, 'admin_update'])->name('admin.users.update');
Route::get('/users/show/{user}', [UserController::class, 'admin_show'])->name('admin.users.show');
Route::get('/users/active/{user}', [UserController::class, 'admin_active'])->name('admin.users.active');

Route::get('/places', [PlaceController::class, 'admin_index'])->name('admin.places');
Route::get('/places/create', [PlaceController::class, 'admin_place_create'])->name('admin.places.create');
Route::post('/places/store', [PlaceController::class, 'admin_place_store'])->name('admin.places.store');
Route::get('/places/edit/{place}', [PlaceController::class, 'admin_place_edit'])->name('admin.places.edit');
Route::put('/places/update/{place}', [PlaceController::class, 'admin_place_update'])->name('admin.places.update');
Route::get('/places/show/{place}', [PlaceController::class, 'admin_place_show'])->name('admin.places.show');
Route::get('/places/active/{place}', [PlaceController::class, 'admin_place_active'])->name('admin.places.active');
Route::get('/places/destroy/{id}', [PlaceController::class, 'destroy'])->name('admin.places.destroy');
Route::get('/places/restore/{id}', [PlaceController::class, 'restore'])->name('admin.places.restore');
Route::get('/places/business/{place}', [PlaceController::class, 'admin_place_business'])->name('admin.places.business');
Route::post('/places/business/{place}', [PlaceController::class, 'admin_place_business_post'])->name('admin.places.business.post');

Route::get('/place/manager/{id?}', [PlaceController::class, 'manager'])->name('admin.place.manager');
Route::post('/place/save', [PlaceController::class, 'save']);

//eventos
//Route::get('indexeventos', function (){
//    dd('opa');
//});
Route::get('eventos', [EventoController::class, 'index'])->name('admin.eventos.index');
Route::get('evento/manager/{id?}', [EventoController::class, 'manager'])->name('admin.evento.manager');
//Route::post('evento/save', [EventoController::class, 'save'])->name('admin.evento.save');
Route::get('/evento/destroy/{id}', [EventoController::class, 'destroy'])->name('admin.evento.destroy');

Route::get('/place-categories', [PlaceCategoryController::class, 'index'])->name('admin.place_categories');
Route::get('/place-categories/create', [PlaceCategoryController::class, 'create'])->name('admin.place_categories.create');
Route::post('/place-categories/store', [PlaceCategoryController::class, 'store'])->name('admin.place_categories.store');
Route::get('/place-categories/edit/{place_category}', [PlaceCategoryController::class, 'edit'])->name('admin.place_categories.edit');
Route::put('/place-categories/update/{place_category}', [PlaceCategoryController::class, 'update'])->name('admin.place_categories.update');
Route::get('/place-categories/show/{place_category}', [PlaceCategoryController::class, 'show'])->name('admin.place_categories.show');
Route::get('/place-categories/active/{place_category}', [PlaceCategoryController::class, 'active'])->name('admin.place_categories.active');

Route::get('/place-subcategories', [PlaceSubcategoryController::class, 'index'])->name('admin.place_subcategories');
Route::get('/place-subcategories/create', [PlaceSubcategoryController::class, 'create'])->name('admin.place_subcategories.create');
Route::post('/place-subcategories/store', [PlaceSubcategoryController::class, 'store'])->name('admin.place_subcategories.store');
Route::get('/place-subcategories/edit/{place_subcategory}', [PlaceSubcategoryController::class, 'edit'])->name('admin.place_subcategories.edit');
Route::put('/place-subcategories/update/{place_subcategory}', [PlaceSubcategoryController::class, 'update'])->name('admin.place_subcategories.update');
Route::get('/place-subcategories/show/{place_subcategory}', [PlaceSubcategoryController::class, 'show'])->name('admin.place_subcategories.show');
Route::get('/place-subcategories/active/{place_subcategory}', [PlaceSubcategoryController::class, 'active'])->name('admin.place_subcategories.active');

Route::get('/blogs', [ArticleController::class, 'index'])->name('admin.blogs');
Route::get('/blogs/create', [ArticleController::class, 'create'])->name('admin.blogs.create');
Route::post('/blogs/store', [ArticleController::class, 'store'])->name('admin.blogs.store');
Route::get('/blogs/edit/{article}', [ArticleController::class, 'edit'])->name('admin.blogs.edit');
Route::put('/blogs/update/{article}', [ArticleController::class, 'update'])->name('admin.blogs.update');
Route::get('/blogs/show/{article}', [ArticleController::class, 'show'])->name('admin.blogs.show');
Route::get('/blogs/published/{article}', [ArticleController::class, 'published'])->name('admin.blogs.published');

Route::get('/reunions', [ReunionController::class, 'index'])->name('admin.reunions');
Route::get('/reunions/create', [ReunionController::class, 'create'])->name('admin.reunions.create');
Route::post('/reunions/store', [ReunionController::class, 'store'])->name('admin.reunions.store');
Route::get('/reunions/edit/{article}', [ReunionController::class, 'edit'])->name('admin.reunions.edit');
Route::put('/reunions/update/{article}', [ReunionController::class, 'update'])->name('admin.reunions.update');
Route::get('/reunions/show/{article}', [ReunionController::class, 'show'])->name('admin.reunions.show');
Route::get('/reunions/active/{article}', [ReunionController::class, 'active'])->name('admin.reunions.active');
