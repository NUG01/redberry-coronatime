<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    

    public function rules()
    {
        
        return [
            'password'       => 'required|min:3',
			'repeat-password'=> 'required|same:password',
            'token'          => 'required'
        ];
        
        dd('hi');
    }
}
