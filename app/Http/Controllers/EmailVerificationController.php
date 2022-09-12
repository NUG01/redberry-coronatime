<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class EmailVerificationController extends Controller
{
    public function verifyUser()
	{
		$verification_code = Request::get('code');
		$user = User::where(['verification_code'=>$verification_code])->first();
		if ($user != null)
		{
           
			$user->is_verified = 1;
			$user->save();
			return view('emailConfirmation',['code'=>$verification_code]);
		}
		else
		{
			return redirect('/register');
		}
	}
}
