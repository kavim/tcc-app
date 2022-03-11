<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialiteLoginController;

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

Route::get('/', [HomeController::class, 'welcome']);
// auth do laravel
Auth::routes();
//rotas para autenticação com linkedin
Route::get('socialitelogin/{provider}', [SocialiteLoginController::class, 'redirectToProvider'])->name('linkedinlogin');
Route::get('{provider}/callback', [SocialiteLoginController::class, 'handleProviderCallback']);
Route::get('change-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('change-language');
Route::get('/students', [HomeController::class, 'students'])->name('students');
// uma forma mais simples de acessar o perfil do usuário
Route::get('/u/{slug_name}', [HomeController::class, 'studentsShow'])->name('students.show');
Route::get('/post', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/{id}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('app.dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [DashboardController::class, 'editProfile'])->name('app.profile.edit');
        Route::post('/update', [DashboardController::class, 'updateProfile'])->name('app.profile.update');
        Route::get('/avatar/edit/', [DashboardController::class, 'editAvatar'])->name('app.profile.edit.avatar');
        Route::post('/avatar/update/', [DashboardController::class, 'updateAvatar'])->name('app.profile.update.avatar');
        Route::get('/cover/edit/', [DashboardController::class, 'editCover'])->name('app.profile.edit.cover');
        Route::post('/cover/update/', [DashboardController::class, 'updateCover'])->name('app.profile.update.cover');
        Route::get('/resume/edit/', [DashboardController::class, 'editResume'])->name('app.profile.edit.resume');
        Route::post('/resume/update/', [DashboardController::class, 'updateResume'])->name('app.profile.update.resume');

    });
});
