<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
	public function show()
	{
		return view('login');
	}
	public function login(LoginRequest $request)
	{

    
    $identify=$request->validated()['username'];
		$password=$request->validated()['password'];
    $this->validated=filter_var($identify,FILTER_VALIDATE_EMAIL)?'email':'username';

  
  if(auth()->attempt(array($this->validated=>$identify, 'password'=>$password,'is_verified' => 1))){
   
    return redirect('/worldwide');
  }else{

    return redirect()->back()->with('incorrect','Provided credentials are incorrect. Try again.');
    
  }

  
	}

  public function logout(){
          auth()->logout();
          return redirect('/');
       
  }
}