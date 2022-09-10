<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
	public function show()
	{
		return view('login');
	}
	public function login(StoreLoginRequest $request)
	{

  
		$identify=$request->validated()['identify'];
		$password=$request->validated()['password'];
    $this->validated=filter_var($identify,FILTER_VALIDATE_EMAIL)?'email':'username';

  
  if(auth()->attempt(array($this->validated=>$identify, 'password'=>$password,'is_verified' => 1))){
 
    return redirect('/worldwide');
  }else{
    return redirect('/');
    
  }

  //  $request->validated()->merge([$this->validated => $identify]);
	}
}
