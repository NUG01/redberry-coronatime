<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class RegisterController extends Controller
{
	public function create()
	{
		return view('register');
	}

	public function register(RegisterRequest $request)
	{
		$user = User::create([
			'email'             => $request->email,
			'username'          => $request->username,
			'password'          => bcrypt($request->password),
			'verification_code' => sha1(time()),
		]);
		if ($user != null)
		{
			EmailController::sendEmail($user->username, $user->email, $user->verification_code);
			return view('confirmation');
		}
	}

}
