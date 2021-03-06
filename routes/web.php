<?php

use App\Http\Controllers\Auth\CompanyRegisterController;
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

Route::get('/', [HomeController::class, 'welcome'])->name('home');
// auth do laravel
Auth::routes();
//rotas para autenticação com linkedin
Route::get('socialitelogin/{provider}', [SocialiteLoginController::class, 'redirectToProvider'])->name('linkedinlogin');
Route::get('{provider}/callback', [SocialiteLoginController::class, 'handleProviderCallback']);
Route::get('change-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('change-language');
Route::get('/students', [HomeController::class, 'students'])->name('students');

Route::get('/for_companies', [HomeController::class, 'for_companies'])->name('for_companies');
Route::post('/for_companies/register', [CompanyRegisterController::class, 'register'])->name('for_companies.register');

// uma forma mais simples de acessar o perfil do usuário
Route::get('/u/{slug_name}', [HomeController::class, 'studentsShow'])->name('students.show');
Route::get('/post', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/{id}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('app.dashboard');
    Route::get('/home', [DashboardController::class, 'index']);
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [DashboardController::class, 'editProfile'])->name('app.profile.edit');
        Route::post('/update', [DashboardController::class, 'updateProfile'])->name('app.profile.update');
        Route::get('/avatar/edit/', [DashboardController::class, 'editAvatar'])->name('app.profile.edit.avatar');
        Route::post('/avatar/update/', [DashboardController::class, 'updateAvatar'])->name('app.profile.update.avatar');
        Route::get('/cover/edit/', [DashboardController::class, 'editCover'])->name('app.profile.edit.cover');
        Route::post('/cover/update/', [DashboardController::class, 'updateCover'])->name('app.profile.update.cover');
        Route::get('/resume/edit/', [DashboardController::class, 'editResume'])->name('app.profile.edit.resume');
        Route::post('/resume/update/', [DashboardController::class, 'updateResume'])->name('app.profile.update.resume');
        Route::get('/experiences/edit/', [DashboardController::class, 'editExperiences'])->name('app.profile.edit.experiences');
        Route::post('/experiences/update/', [DashboardController::class, 'updateExperiences'])->name('app.profile.update.experiences');
        Route::get('/course/edit/', [DashboardController::class, 'editCourse'])->name('app.profile.edit.course');
        Route::post('/course/update/', [DashboardController::class, 'updateCourse'])->name('app.profile.update.course');
        Route::get('/status/edit/', [DashboardController::class, 'editStatus'])->name('app.profile.edit.status');
        Route::post('/status/update/', [DashboardController::class, 'updateStatus'])->name('app.profile.update.status');
        Route::get('/social_networks/edit/', [DashboardController::class, 'editSocialNetworks'])->name('app.profile.edit.social_networks');
        Route::post('/social_networks/update/', [DashboardController::class, 'updateSocialNetworks'])->name('app.profile.update.social_networks');

        //app.verify_academic_email
        Route::post('/verify_academic_email', [DashboardController::class, 'verifyAcademicEmail'])->name('app.verify_academic_email');
        Route::get('/handle_email_verify_token/{token}', [DashboardController::class, 'handleVerifyAcademicEmail'])->name('app.handle_email_verify_token');

    });
});

Route::get('error-page', function(){
    return view('web.error-page');
})->name('app.error');
