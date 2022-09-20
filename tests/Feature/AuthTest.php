<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;


   public function test_login_page_availability(){
    $response=$this->get('/login');
    $response->assertSuccessful();
    $response->assertViewIs('login');
   
   }
   public function test_logout_functionality(){
    $response=$this->get('/logout');
    $response->assertRedirect('/login');
   
   }
   public function test_auth_should_give_errors_if_no_input_is_provided(){
       
}
public function test_auth_should_give_email_error_if_no_email_is_provided(){
    $response=$this->post('/login',['password'=>'password123']);
    
    $response->assertSessionHasErrors(['username']);
    $response->assertSessionDoesntHaveErrors(['password']);
    
}
public function test_auth_should_give_password_error_if_no_password_is_provided(){
       $response=$this->post('/login',['username'=>'dummy@gmail.com']);

       $response->assertSessionHasErrors(['password']);
       $response->assertSessionDoesntHaveErrors(['username']);

   }
   public function test_auth_should_give_email_error_if_no_email_is_wrong(){

   }
   public function test_auth_should_give_no_user_exists_error_if_no_user_exists_with_provided_credentials(){

   }
   public function test_auth_should_redirect_on_worldwide_page_if_login_is_successfull(){

   }
  
}
