<?php

use App\Http\Controllers\EmailVerificationController;
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


Route::get('/register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->name('register.register')->middleware('guest');

Route::get('/verify', [EmailVerificationController::class, 'verifyUser'])->name('verify.user')->middleware('guest');

Route::get('/', [LoginController::class, 'show'])->name('login.show')->middleware('guest');
Route::post('/', [LoginController::class, 'login'])->name('user.login')->middleware('guest');


Route::post('/logout',[LoginController::class,'logout'])->name('logout.destroy')->middleware('auth');







Route::get('/email-confirmation', function () {
    return view('emailConfirmation');
});


Route::get('/reset-password', function () {
	return view('passwordReset');
});

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
