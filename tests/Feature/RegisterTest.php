<?php

namespace Tests\Feature;

use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;
	// private User $user;

	// protected function setUp(): void{
	// 	parent::setUp();
	// 	$this->user=User::factory()->create();
	// }

	public function test_if_registration_page_is_available()
	{
		$response = $this->get('/register');
		$response->assertSuccessful();
		$response->assertViewIs('register');
	}

	public function test_if_mail_is_sent_to_the_registered_user()
	{
		$pass = bcrypt(fake()->word());
		$mail = fake()->email();
		$name = fake()->name();
		$data = [
			'email'                     => $mail,
			'username'                  => $name,
			'password'                  => $pass,
			'repeat-password'           => $pass, ];
		$response = $this->post('/register', $data);

		$bool = $data ? true : null;

		$this->assertTrue($bool);

		Mail::fake();

		Mail::to($mail)->send(new RegisterEmail($data));
		Mail::assertSent(RegisterEmail::class);
		$response->assertViewIs('confirmation');
	}
}
