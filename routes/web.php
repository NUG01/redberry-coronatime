<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TableSortController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// Auth::routes(['verify' => true]);
Route::get('/change-locale/{locale}', [LanguageController::class, 'locale'])->name('locale.change');
Route::get('/verify', [EmailVerificationController::class, 'verifyUser'])->name('verify.user')->middleware('guest');
Route::get('/email-confirmation', [EmailVerificationController::class, 'emailConfirmation'])->name('verification.notice')->middleware('verified');

Route::middleware('auth')->group(function () {
	Route::get('/worldwide', [StatisticController::class, 'show'])->name('worldwide.show');
	Route::get('/countries', [StatisticController::class, 'showTable'])->name('countries.show');
	Route::post('/worldwide', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
	Route::get('/countries/{slug}', [TableSortController::class, 'sort'])->name('table.sort');
});

Route::controller(LoginController::class)->group(function () {
	Route::get('/', 'redirect')->name('login.redirect');
	Route::get('/login', 'show')->name('login.show')->middleware('guest');
	Route::post('/login', 'login')->name('user.login')->middleware('guest');
	Route::post('/logout', 'logout')->name('logout.destroy')->middleware('auth');
});

Route::controller(RegisterController::class)->group(function () {
	Route::get('/register', 'create')->name('register.create')->middleware('guest');
	Route::post('/register', 'register')->name('register.register')->middleware('guest');
});

Route::controller(ResetPasswordController::class)->group(function () {
	// Route::get('/forget-password', 'show')->name('forgetPassword.show')->middleware('guest');
	Route::get('/forget-password', 'show')->name('forgetPassword.show');
	// Route::post('/forget-password', 'send')->name('forgetPassword.send')->middleware('guest');
	Route::post('/forget-password', 'send')->name('forgetPassword.send');
	Route::get('/forget-password/{token}', 'resetForm')->name('forgetPassword.form')->middleware('guest');
	Route::post('/reset-password-form', 'update')->name('password.update')->middleware('guest');
});
