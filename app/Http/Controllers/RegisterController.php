<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;

class RegisterController extends Controller
{
	public function create(): View
	{
		return view('register');
	}

	public function register(RegisterRequest $request): View
	{
		$user = User::create([
			'email'             => $request->email,
			'username'          => $request->username,
			'password'          => bcrypt($request->password),
			'verification_code' => sha1(time()),
		]);
		// $user = User::create([$request->validated()]);
		if ($user != null)
		{
			EmailVerificationController::sendEmail($user->username, $user->email, $user->verification_code);
			return view('confirmation');
		}
	}
}
