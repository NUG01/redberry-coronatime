<?php

use App\Http\Controllers\RegisterController;
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

////////////////////////////Testing layout!////////////////////////

Route::get('/', function () {
	return view('login');
});
Route::get('/register', [RegisterController::class, 'create'])->name('register_create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
// Auth::routes(['verify'=>true]);

Route::get('/reset-password', function () {
	return view('passwordReset');
});
Route::get('/confirmation', function () {
	return view('confirmation');
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
