<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stringable;
use Illuminate\Database\Eloquent\Builder;

class ResetPasswordController extends Controller
{
    public function show(){
        return view('passwordReset');
    }
    public function resetForm(ResetPasswordRequest $request,$token=null){
        return view('changePassword')->with(['token'=>$token,'email'=>$request->email]);
    }
    public function update(UpdatePasswordRequest $request){
  
        $check_token=DB::table('password_resets')->where([
           'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back();
        }else{
    //    dd(DB::table('users')->where('email',$check_token->email)->first()->password);
    
    User::where('email',$check_token->email)->update([
              'password'=>Hash::make($request->password)
          ]);
       
            DB::table('password_resets')->where([
                'email'=>$check_token->email
           ])->delete();

           return redirect('/');
        }
    }
    public function send(ResetPasswordRequest $request){

        $token= bin2hex(random_bytes(32));
        DB::table('password_resets')->insert([
        'email'=>  $request->email,
        'token'=>$token,
        'created_at'=>Carbon::now(),
        ]);

        $action_link=route('resetPassword.form',['token'=>$token,'email'=>$request->email]);
        $body="You asked for password reset? then reset it";
      Mail::send('emails.verify.reset',['action_link'=>$action_link,'body'=>$body], function($message) use($request){
      $message->from('nskhiereli@gmail.com', 'CoronaTime');
      $message->to($request->email, 'CoronaTime')->subject('Reset Password');
      });
        return view('resetConfirm');
    }
}
