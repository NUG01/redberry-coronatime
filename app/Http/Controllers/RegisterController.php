<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
	// public function __construct()
	// {
	//     $this->middleware('auth','verified');
	// }

	public function create()
	{
		return view('register');
	}

	public function store(StoreRegisterRequest $request)
	{
		$attributes = $request->validated();
		$attributes['password'] = bcrypt($attributes['password']);
		User::create($attributes);
		return redirect('/confirmation');
	}
}
