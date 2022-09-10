<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class RegisterController extends Controller
{
	// public function __construct()
	// {
	//     $this->middleware(['auth','verified']);
	// }

	public function create()
	{
		return view('register');
	}

	public function show()
	{
		return view('confirmation');
	}

	public function register(StoreRegisterRequest $request)
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
			return redirect('/confirmation');
		}
	}

	public function verifyUser(Request $request)
	{
		$verification_code = Request::get('code');
		$user = User::where(['verification_code'=>$verification_code])->first();
		if ($user != null)
		{
			$user->is_verified = 1;
			$user->save();
			return redirect('/');
		}
		else
		{
			return redirect('/register');
		}
	}
}
