<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TableSortController;
use App\Models\Statistic;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
Auth::routes(['verify' => true]);
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
	Route::get('/reset-password', 'show')->name('resetPassword.show');
	Route::post('/reset-password', 'send')->name('resetPassword.send');
	Route::get('/reset-password/{token}', 'resetForm')->name('resetPassword.form');
	Route::post('/password-changed', 'update')->name('password.update');
	Route::get('/password-updated', 'showSuccess')->name('password.success');
	Route::get('/change-password', 'changePassword')->name('password.change');
});

