<?php

namespace App\Http\Controllers;

use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class EmailVerificationController extends Controller
{
	public function verifyUser(): RedirectResponse|View
	{
		$verificationCode = Request::get('code');
		$user = User::where(['verification_code'=>$verificationCode])->first();
		if ($user != null)
		{
			$user->is_verified = 1;
			$user->save();
			return view('emailConfirmation', ['code'=>$verificationCode]);
		}
		else
		{
			return redirect()->route('register.create');
		}
	}

	public static function sendEMail($username, $email, $verificationCode)
	{
		$data = [
			'email'             => $email,
			'verification_code' => $verificationCode,
			'username'          => $username,
		];
		Mail::to($email)->send(new RegisterEmail($data));
	}

	public function emailConfirmation(): View
	{
		return view('emailConfirmation');
	}
}
