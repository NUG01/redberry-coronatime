<?php

namespace Tests\Feature;

use App\Mail\RegisterEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_if_password_reset_view_is_returned_when_clicked_on_link()
	{
		$response = $this->get('/forget-password');

		$response->assertViewIs('passwordReset');
	}

	public function test_if_password_reset_request_is_sent_to_the_mail()
	{
		$response = $this->post('/forget-password', ['email'=>$this->user->email]);
		Mail::fake();
		Mail::to($this->user->email)->send(new RegisterEmail($this->user->email));
		Mail::assertSent(RegisterEmail::class);
		$response->assertViewIs('resetConfirm');
	}

	public function test_if_password_updating_is_success_with_right_credentials()
	{
		$token = bin2hex(random_bytes(32));
		$pass = bcrypt('pass123');
		$data = [
			'password'       => $pass,
			'repeat-password'=> $pass,
			'token'          => $token,
		];
		DB::table('password_resets')->insert([
			'email'     => $this->user->email,
			'token'     => $token,
			'created_at'=> Carbon::now(),
		]);
		$checkToken = DB::table('password_resets')->get();
		$response = $this->post('/reset-password-form', $data);
		$hasUser = $checkToken ? true : false;
		$this->assertTrue($hasUser);

		User::where('email', $this->user->email)->update([
			'password'=> Hash::make($pass), ]);
		DB::table('password_resets')->where([
			'email'=> $this->user->email, ])->delete();

		$response->assertViewIs('signResetPassword');
	}

	public function test_if_password_updating_is_success_with_wrong_credentials()
	{
		$token = bin2hex(random_bytes(32));
		$token2 = bin2hex(random_bytes(32));
		$data = [
			'password'       => 'pass123',
			'repeat-password'=> 'pass123',
			'token'          => $token2,
		];
		$response = $this->post('/reset-password-form', $data);
		$checkToken = DB::table('password_resets')->where([
			'token'=> $token,
		])->first();
		$response->assertRedirect('/');
	}

	public function test_if_reset_form_is_shown()
	{
		$token = bin2hex(random_bytes(32));
		$response = $this->get('/forget-password/' . $token . '?email=' . $this->user->email);
		$response->assertViewIs('changePassword');
		$response->assertViewHas(['token'=>null, 'email'=>$this->user->email]);
	}
}
