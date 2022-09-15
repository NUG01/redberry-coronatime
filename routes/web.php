<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\FetchApiController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\StatisticController;
use App\Models\Country;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\Count;

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
Route::get('/change-locale/{locale}', [LanguageController::class,'locale'])->name('locale.change');



Route::get('/verify', [EmailVerificationController::class, 'verifyUser'])->name('verify.user')->middleware('guest');
Route::get('/email-confirmation', [EmailVerificationController::class, 'emailConfirmation'])->name('confirmation.show');




Route::get('/worldwide', [StatisticController::class, 'show'])->name('worldwide.show')->middleware('auth');
Route::get('/countries', [StatisticController::class, 'showTable'])->name('countries.show')->middleware('auth');


Route::controller(LoginController::class)->group(function () {
	Route::get('/', [LoginController::class, 'redirect'])->name('login.redirect')->middleware('guest');
	Route::get('/login', [LoginController::class, 'show'])->name('login.show')->middleware('guest');
	Route::post('/login', [LoginController::class, 'login'])->name('user.login')->middleware('guest');
	Route::post('/logout', [LoginController::class, 'logout'])->name('logout.destroy')->middleware('auth');
	
});

Route::controller(RegisterController::class)->group(function () {
	Route::get('/register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
	Route::post('/register', [RegisterController::class, 'register'])->name('register.register')->middleware('guest');
});


Route::controller(ResetPasswordController::class)->group(function () {
	Route::get('/reset-password', [ResetPasswordController::class, 'show'])->name('resetPassword.show');
	Route::post('/reset-password', [ResetPasswordController::class, 'send'])->name('resetPassword.send');
	Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetForm'])->name('resetPassword.form');
	Route::post('/password-changed', [ResetPasswordController::class, 'update'])->name('password.update');
	Route::get('/password-updated', [ResetPasswordController::class, 'showSuccess'])->name('password.success');
	Route::get('/change-password', [ResetPasswordController::class, 'changePassword'])->name('password.change');
	
});