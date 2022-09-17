<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\FetchApiController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\StatisticController;
use App\Models\Country;
use App\Models\Statistic;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Auth::routes(['verify' => true]);
Route::get('/verify', [EmailVerificationController::class, 'verifyUser'])->name('verify.user')->middleware('guest');
Route::get('/email-confirmation', [EmailVerificationController::class, 'emailConfirmation'])->name('verification.notice')->middleware('verified');

Route::post('/worldwide', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/worldwide', [StatisticController::class, 'show'])->name('worldwide.show')->middleware('auth');
Route::get('/countries', [StatisticController::class, 'showTable'])->name('countries.show')->middleware('auth');


Route::controller(LoginController::class)->group(function () {
	Route::get('/', 'redirect')->name('login.redirect');
	Route::get('/login', 'show')->name('login.show')->middleware('guest');
	Route::post('/login', 'login')->name('user.login')->middleware('guest');
	Route::post('/logout','logout')->name('logout.destroy')->middleware('auth');
	
});

Route::controller(RegisterController::class)->group(function () {
	Route::get('/register','create')->name('register.create')->middleware('guest');
	Route::post('/register','register')->name('register.register')->middleware('guest');
});


Route::controller(ResetPasswordController::class)->group(function () {
	Route::get('/reset-password', 'show')->name('resetPassword.show');
	Route::post('/reset-password', 'send')->name('resetPassword.send');
	Route::get('/reset-password/{token}', 'resetForm')->name('resetPassword.form');
	Route::post('/password-changed', 'update')->name('password.update');
	Route::get('/password-updated','showSuccess')->name('password.success');
	Route::get('/change-password',  'changePassword')->name('password.change');
	
});
























Route::get('/test',function(){
	$countriesUrl = 'https://devtest.ge/countries';

	$response = Http::get($countriesUrl);
	$data = json_decode($response->body());
	

	foreach ($data as $countryData)
	{
		$countryData = (array)$countryData;
		
		// Country::where('code', $countryData['code'])->delete();
		Statistic::where('country_code', $countryData['code'])->delete();


		Statistic::updateOrCreate([
			'country_code'=> $countryData['code'],
			'name'=> [
				'en'=> $countryData['name']->en,
				'ka'=> $countryData['name']->ka,
				//////////////აქ აერორებს  array to string conversion ს ///////////////////////////
			],
		]);
	}
	$codes = DB::table('countries')->pluck('code');

	foreach ($codes as $code)
	{
		$statistic = Http::post('https://devtest.ge/get-country-statistics', ['code'=>$code]);
		$dataStats = json_decode($statistic->body());
		$dataStats = (array)$dataStats;
		Statistic::Create([
			'id'          => $dataStats['id'],
			'country_code'=> $code,
			'country'     => $dataStats['country'],
			'confirmed'   => $dataStats['confirmed'],
			'recovered'   => $dataStats['recovered'],
			'deaths'      => $dataStats['deaths'],
			'critical'    => $dataStats['critical'],
		]);
	}
});