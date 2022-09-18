<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Mail\SubscribeEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
	public function subscribe(SubscribeRequest $request): RedirectResponse
	{
		if ($request->subscribeEmail == Auth::user()->email)
		{
			Mail::to($request->subscribeEmail)->send(new SubscribeEmail());
			return redirect()->route('worldwide.show')->with('success', '');
		}
		else
		{
			return redirect()->route('worldwide.show')->with('failure', '');
		}
	}
}
