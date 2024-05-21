<?php

namespace Tests\Dev;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\ChangeEmail;

class EmailChangeConfirmTest extends TestCase
{
	use RefreshDatabase;

	public function test_email_change_confirm_not_logged(): void
	{
		$user = User::factory()->create([
			'name' => 'Alex',
			'email' => uniqid() . '@laravel.com'
		]);

		$name = $user->name;
		$email = $user->email;

		$this->assertDatabaseHas('users', [
			'name' => $name,
			'email' => $email,
		]);

		$response = $this->getJson('web/api/change/email/1/code123', [
			'email' => $email,
		]);

		$response->assertStatus(401)->assertJson([
			'message' => 'Unauthenticated.',
		]);
	}

	function test_change_user_email_confirm()
	{
		$code = uniqid();

		$user = User::factory()->create([
			'name' => 'Alex',
			'email' => uniqid() . '@gmail.com'
		]);

		$name = $user->name;
		$email = $user->email;

		$this->assertDatabaseHas('users', [
			'name' => $name,
			'email' => $email,
		]);

		$this->actingAs($user);

		ChangeEmail::create([
			'user_id' => $user->id,
			'email_old' => $user->email,
			'email_new' => 'new_' . $user->email,
			'code' => $code,
		]);

		$response = $this->getJson('web/api/change/email/' . $user->id . '/' . $code);

		$response->assertStatus(200)->assertJson([
			'message' => 'Email address has been updated. Refresh panel page.',
		]);
	}
}
