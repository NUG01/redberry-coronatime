<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

////////////////////////////Testing layout!////////////////////////

Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'register'])->name('register.register');

Route::get('/verify', [RegisterController::class, 'verifyUser'])->name('verify.user');

Route::get('/', [LoginController::class, 'show'])->name('login.show');
Route::post('/', [LoginController::class, 'login'])->name('user.login');

Route::get('/confirmation', [RegisterController::class, 'show'])->name('register.sendEmail');

Route::get('/reset-password', function () {
	return view('passwordReset');
});

Route::get('/password-updated', function () {
	return view('passwordUpdated');
});
Route::get('/change-password', function () {
	return view('changePassword');
});
Route::get('/email-confirmation', function () {
	return view('emailConfirmation');
});
Route::get('/worldwide', function () {
	return view('worldwide');
});
Route::get('/countries', function () {
	return view('countries');
});
