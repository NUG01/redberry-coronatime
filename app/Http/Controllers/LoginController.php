<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
	public function show(): View
	{
		return view('login');
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$username = $request->validated()['username'];
		$password = $request->validated()['password'];
		$this->validated = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (auth()->attempt([$this->validated=>$username, 'password'=>$password, 'is_verified' => 1], $request->has('remember_device')))
		{
			return redirect()->route('worldwide.show');
		}
		else
		{
			return redirect()->back()->with('incorrect', '');
		}
	}

  public function logout(): RedirectResponse
  {
  	auth()->logout();
  	return redirect()->route('login.show');
  }

  public function redirect(): RedirectResponse
  {
  	return redirect()->route('login.show');
  }
}
