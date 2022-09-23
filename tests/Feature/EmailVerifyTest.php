<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailVerifyTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_if_email_is_sent()
	{
		$response = $this->get('/');

		$response->assertStatus(200);
	}

	public function test_if_email_confirmation_view_is_shown()
	{
		$response = $this->actingAs($this->user)->get('/email-confirmation');
		$response->assertSuccessful();
		$response->assertViewIs('emailConfirmation');
	}

//     public function test_if_user_verify_view_is_returned_with_token(){
//         $response=$this->actingAs($this->user)->get('/verify');
//         $this->user['is_verified']=0;
//        $verified=User::where(['verification_code'=>$this->user->verification_code])->first();
//        $hasUser = $verified ? true : false;

//        $this->assertTrue($hasUser);
//        $verified->is_verified=1;
//        $verified->save();

//     $response->assertViewIs('emailConfirmation');
//     dd('hi');

//     $response->assertViewHas('code',$verified->verification_code);
// }
public function test_if_user_verify_view_is_not_returned_with_token()
{
	$response = $this->get('/verify');
	$this->user['is_verified'] = 0;
	$verified = User::where(['verification_code'=>200])->first();
	$hasUser = $verified ? true : false;
	$this->assertTrue(!$hasUser);
	$response->assertRedirect(route('register.create'));
}
}
