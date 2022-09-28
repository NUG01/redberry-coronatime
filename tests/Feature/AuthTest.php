<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_redirect_to_login_from_home_page()
	{
		$response = $this->get('/');
		$response->assertRedirect('/login');
	}

	public function test_login_page_is_available()
	{
		$response = $this->get('/login');
		$response->assertSuccessful();
		$response->assertViewIs('login');
	}

public function test_logout_functionality()
{
	$response = $this->actingAs($this->user)->post('/logout');
	$response->assertRedirect('/login');
}

	public function test_auth_should_give_errors_if_no_input_is_provided()
	{
		$response = $this->post('/login', ['password'=>'', 'username'=>'']);

		$response->assertSessionHasErrors(['username', 'password']);
	}

public function test_auth_should_give_email_error_if_no_username_is_provided()
{
	$response = $this->post('/login', ['password'=>'password123']);

	$response->assertSessionDoesntHaveErrors(['password']);
}

public function test_auth_should_give_password_error_if_no_password_is_provided()
{
	$response = $this->post('/login', ['username'=>'dummy@gmail.com']);

	$response->assertSessionHasErrors(['password']);
	$response->assertSessionDoesntHaveErrors(['username']);
}

	public function test_auth_should_give_email_error_if_username_is_wrong()
	{
		$response = $this->post('/login', ['username'=>'dummygmail.com', 'password'=>'password123']);
		$response->assertSessionHas('incorrect');
	}

	public function test_auth_should_give_no_user_exists_error_if_no_user_exists_with_provided_credentials()
	{
		$response = $this->post('/login', ['username'=>'dummy@gmail.com', 'password'=>'password123']);
		$response->assertSessionHas('incorrect');
	}

	public function test_auth_should_redirect_on_worldwide_page_if_login_is_successfull_with_username()
	{
		$response = $this->actingAs($this->user)->post('/login', [
			'email'       => $this->user->username,
			'password'    => 'password123',
			'is_verified' => 1,
		]);

		$this->actingAs($this->user);

		$response->assertRedirect(route('worldwide.show'));
	}

	public function test_auth_should_redirect_on_worldwide_page_if_login_is_successfull_with_email()
	{
		$response = $this->post('/login', [
			'username'    => $this->user->username,
			'password'    => 'password123',
			'is_verified' => 1,
		]);
		$this->actingAs($this->user);
		// $this->assertAuthenticated();
		$response->assertRedirect(route('worldwide.show'));
	}

	public function test_auth_should_show_error_on_page_if_login_is_unsuccessfull()
	{
		$response = $this->post('/login', [
			'username'    => 'test@redberry.ge',
			'password'    => 'test123',
		]);

		$response->assertSessionHas('incorrect');
	}

	public function test_locale_change_on_supported_languages()
	{
		$response = $this->get('/change-locale/en');

		$response->assertSessionHas('lang', 'en');
		$response->assertRedirect(back());
	}

	public function test_locale_change_if_language_is_not_supported()
	{
		$response = $this->get('/change-locale/esp');

		$response->assertSessionHas('lang', 'en');
		$response->assertRedirect(back());
	}

	public function test_if_login_page_redirect_is_successfull_from_main()
	{
		$response = $this->actingAs($this->user)->get('/');
		$response->assertRedirect(route('login.show'));
	}
}
