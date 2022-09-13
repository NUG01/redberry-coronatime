<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class ResetPasswordController extends Controller
{
	public function show(): View
	{
		return view('passwordReset');
	}

	public function resetForm(ResetPasswordRequest $request, $token = null): View
	{
		return view('changePassword')->with(['token'=>$token, 'email'=>$request->email]);
	}

	public function update(UpdatePasswordRequest $request): View|RedirectResponse
	{
		$check_token = DB::table('password_resets')->where([
			'token'=> $request->token,
		])->first();

		if (!$check_token)
		{
			return back();
		}
		else
		{
			User::where('email', $check_token->email)->update([
				'password'=> Hash::make($request->password),
			]);

			DB::table('password_resets')->where([
				'email'=> $check_token->email,
			])->delete();

			return view('signResetPassword');
		}
	}

	public function send(ResetPasswordRequest $request): View
	{
		$token = bin2hex(random_bytes(32));
		DB::table('password_resets')->insert([
			'email'     => $request->email,
			'token'     => $token,
			'created_at'=> Carbon::now(),
		]);

		$action_link = route('resetPassword.form', ['token'=>$token, 'email'=>$request->email]);
		$body = 'You asked for password reset? then reset it';
		Mail::send('emails.verify.reset', ['action_link'=>$action_link, 'body'=>$body], function ($message) use ($request) {
			$message->from('nskhiereli@gmail.com', 'CoronaTime');
			$message->to($request->email, 'CoronaTime')->subject('Reset Password');
		});
		return view('resetConfirm');
	}
}
