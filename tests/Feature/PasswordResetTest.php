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
		$token = bin2hex(random_bytes(32));
		$mail = fake()->email();
		$data = [
			'email'=> $mail, ];
		$response = $this->post('/forget-password', ['email'=>$data['email']]);

		$bool = $data ? true : null;

		$this->assertTrue($bool);
		Mail::fake();

		Mail::to($data['email'])->send(new RegisterEmail($data));
		Mail::assertSent(RegisterEmail::class);
		// $response->assertRedirect('/');
		dd($response->content());
		$response->assertViewIs('resetConfirm');
	}

	// $actionLink = route('forgetPassword.form', ['token'=>$token, 'email'=>$data['email']]);

	//         Mail::send('emails.verify.reset', ['action_link'=>$actionLink, 'body'=>fake()->sentence()], function ($message) use($data) {
	//             $message->from(fake()->email(), fake()->name());
	//             $message->to($data['email'], fake()->name())->subject(fake()->word());
	//         });
	// public function test_if_password_updating_is_success_with_wrong_credentials()
	// {
	// 	$token = bin2hex(random_bytes(32));
	// 	$response = $this->post('/reset-password-form', [
	// 		'password'       => bcrypt('pass123'),
	// 		'repeat-password'=> bcrypt('pass123'),
	// 		'token'          => $token,
	// 	]);
	// 	DB::table('password_resets')->insert([
	// 		'email'     => $this->user->email,
	// 		'token'     => $token,
	// 		'created_at'=> Carbon::now(),
	// 	]);

	// 	$checkToken = DB::table('password_resets')->where([
	// 		'token'=> $token,
	// 	])->first();

	// 	$hasUser = $checkToken ? true : false;

	// 	$this->assertTrue($hasUser);
	// 	User::where('email', $checkToken->email)->update([
	// 		'password'=> Hash::make('pass123'), ]);
	// 	DB::table('password_resets')->where([
	// 		'email'=> $this->user->email, ])->delete();
	// 	dd($response->assertSeeText('reset'));
	// 	$response->assertViewIs('signResetPassword');
	// 	dd('hi');
	// }
}
