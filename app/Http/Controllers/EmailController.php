<?php

namespace App\Http\Controllers;

use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
	public static function sendEMail($username, $email, $verification_code)
	{
		$data = [
			'email'             => $email,
			'verification_code' => $verification_code,
			'username'          => $username,
		];

		Mail::to($email)->send(new RegisterEmail($data));
	}
}
