<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Mail\SubscribeEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
	public function subscribe(SubscribeRequest $request)
	{
		if ($request->subscribeEmail == Auth::user()->email)
		{
			Mail::to($request->subscribeEmail)->send(new SubscribeEmail());
			return redirect('/worldwide');
		}
		else
		{
			return redirect('/worldwide')->with('failure', 'Provided email address is incorrect. Try again');
		}
	}
}
