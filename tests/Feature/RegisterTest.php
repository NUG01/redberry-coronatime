<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
   private User $user;


   protected function setUp(): void
   {
    parent::setUp();
    $this->$user=User::factory()->create();
   }


   public function test_if_registration_page_is_available(){
    $response=$this->get('/register');
    $response->assertSuccessful();
    $response->assertViewIs('register');
   }
   public function test_if_mail_is_sent_to_the_registered_user(){

    $response=$this->post('/register',[
        'email'              => 'test@gmail.com',
        'username'           => 'username',
        'password'           => bcrypt('test'),
        'verification_code'  => sha1(time()),
    ]);
    $response->assertViewIs('confirmation');
   }
}
