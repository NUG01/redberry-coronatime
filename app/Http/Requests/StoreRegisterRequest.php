<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'username' => 'required|min:3|unique:users,username',
			'email'    => 'required|unique:users,email|email',
			'password' => 'required|min:3',
			'password2'=> 'required|same:password',
		];
	}
}
