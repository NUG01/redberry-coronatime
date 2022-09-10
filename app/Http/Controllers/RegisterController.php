<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EmailController;



class RegisterController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

	public function create()
	{
		return view('register');
	}

	public function store(StoreRegisterRequest $request)
	{

        
        $attributes = $request->validated();
        $user=new User();
        $user->username=$attributes['username'];
        $user->email=$attributes['email'];
        $user->password=bcrypt($attributes['password']);
        $user->verification_code=sha1(time());
        $user->save();

      if($user!=null){
          RegisterController::sendEmail($user->email,$user->verification_code);
          
          return redirect('/confirmation');
          }
        
        
        // $user->markEmailAsVerified();
       // $attributes['verification_code']=sha1(time());
     
		// $attributes['password'] = bcrypt($attributes['password']);

    //   $user= User::create($attributes);
     
       
        
	}

    public static function sendEmail($email,$verification_code){
       
       
       
        Mail::to(users: $email)->send(new RegisterEmail($verification_code));
        return redirect('/confirmation');
       
    }

   
}
