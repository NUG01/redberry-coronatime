<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;


   public function test_redirect_to_login_from_home_page(){
    $response=$this->get('/');
    $response->assertRedirect('/login');
   
   }
   public function test_login_page_is_available(){
    $response=$this->get('/login');
    $response->assertSuccessful();
    $response->assertViewIs('login');
    
}
public function test_logout_functionality(){
    $user = User::factory(1)->create();

    $this->get('/logout')
        ->assertRedirect('/login');
   
   }
   public function test_auth_should_give_errors_if_no_input_is_provided(){
       $response=$this->post('/login',['password'=>'','username'=>'']);
       
       $response->assertSessionHasErrors(['username','password']);
}
public function test_auth_should_give_email_error_if_no_username_is_provided(){
    $response=$this->post('/login',['password'=>'password123']);
    
    $response->assertSessionDoesntHaveErrors(['password']);
    
}
public function test_auth_should_give_password_error_if_no_password_is_provided(){
       $response=$this->post('/login',['username'=>'dummy@gmail.com']);

       $response->assertSessionHasErrors(['password']);
       $response->assertSessionDoesntHaveErrors(['username']);
       
    }
    public function test_auth_should_give_email_error_if_username_is_wrong(){
        $response=$this->post('/login',['username'=>'dummygmail.com','password'=>'password123']);
        $response->assertSessionHas('incorrect');
        
        
    }
    public function test_auth_should_give_no_user_exists_error_if_no_user_exists_with_provided_credentials(){
        $response=$this->post('/login',['username'=>'dummy@gmail.com','password'=>'password123']);
        $response->assertSessionHas('incorrect');
        

   }
   
   
   
   
   
   
   
   
   public function test_auth_should_redirect_on_worldwide_page_if_login_is_successfull(){
        $email='test@redberry.ge';
        $password='test123';
        $username='redberry';
        $code=sha1(time());
    
              User::Create([
            'email'              => $email,
			'username'           =>$username,
			'password'           => bcrypt($password),
            'verification_code'  => $code,
         ]);

                $response=$this->post('/login',[
                'username'=>$username,
                'password'=>$password,
                'is_verified' => 1
            ]);

            $response->assertRedirect('/worldwide');
   }
   public function test_auth_should_show_error_on_page_if_login_is_unsuccessfull(){
        $email='test@redberry.ge';
        $password='test123';
        $username='redberry';
        $code=sha1(time());
    
              User::Create([
            'email'              => $email,
			'username'           =>$username,
			'password'           => bcrypt($password),
            'verification_code'  => $code,
         ]);

                $response=$this->post('/login',[
                'username'=>$username,
                'password'=>$password,
                'is_verified' => 1
            ]);

            $response->assertSessionHas('incorrect');
   }
  
}
