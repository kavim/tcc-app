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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('app.dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'index'])->name('app.profile.edit');
        Route::post('/update', [ProfileController::class, 'index'])->name('app.profile.update');

        Route::get('/avatar/edit/', [ProfileController::class, 'editAvatar'])->name('app.profile.edit.avatar');
        Route::get('/avatar/update/', [ProfileController::class, 'updateAvatar'])->name('app.profile.update.avatar');

    });
});
