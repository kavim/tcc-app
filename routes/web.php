<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('change-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('change-language');

Route::middleware(['auth'])->group(function () {

    Route::get('/students', [HomeController::class, 'students'])->name('web.students');
    // Route::get('/students/show/{slug_name}', [HomeController::class, 'studentsShow'])->name('web.students.show');
    // uma forma mais simples de acessar o perfil do usuário
    Route::get('/u/{slug_name}', [HomeController::class, 'studentsShow'])->name('web.students.show');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('app.dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'index'])->name('app.profile.edit');
        Route::post('/update', [ProfileController::class, 'index'])->name('app.profile.update');

        Route::get('/avatar/edit/', [ProfileController::class, 'editAvatar'])->name('app.profile.edit.avatar');
        Route::post('/avatar/update/', [ProfileController::class, 'updateAvatar'])->name('app.profile.update.avatar');
        Route::get('/cover/edit/', [ProfileController::class, 'editCover'])->name('app.profile.edit.cover');
        Route::post('/cover/update/', [ProfileController::class, 'updateCover'])->name('app.profile.update.cover');
        Route::get('/resume/edit/', [ProfileController::class, 'editResume'])->name('app.profile.edit.resume');
        Route::post('/resume/update/', [ProfileController::class, 'updateResume'])->name('app.profile.update.resume');

    });
});
