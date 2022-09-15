<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\FetchApiController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Models\Country;
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

Route::get('/register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->name('register.register')->middleware('guest');

Route::get('/verify', [EmailVerificationController::class, 'verifyUser'])->name('verify.user')->middleware('guest');

Route::get('/', [LoginController::class, 'redirect'])->name('login.redirect')->middleware('guest');
Route::get('/login', [LoginController::class, 'show'])->name('login.show')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('user.login')->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout.destroy')->middleware('auth');

Route::get('/email-confirmation', function () {
	return view('emailConfirmation');
});

Route::get('/reset-password', [ResetPasswordController::class, 'show'])->name('resetPassword.show');
Route::post('/reset-password', [ResetPasswordController::class, 'send'])->name('resetPassword.send');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetForm'])->name('resetPassword.form');
Route::post('/password-changed', [ResetPasswordController::class, 'update'])->name('password.update');

Route::get('/password-updated', function () {
	return view('passwordUpdated');
});
Route::get('/change-password', function () {
	return view('changePassword');
});
Route::get('/worldwide', function () {
	return view('worldwide');
})->middleware('auth');
Route::get('/countries', function () {
	return view('countries');
})->middleware('auth');


