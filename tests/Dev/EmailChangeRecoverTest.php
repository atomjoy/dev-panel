<?php

namespace Tests\Dev;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\ChangeEmail;

class EmailChangeRecoverTest extends TestCase
{
	use RefreshDatabase;

	function test_change_user_email_recover()
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

		ChangeEmail::create([
			'user_id' => $user->id,
			'email_old' => $user->email,
			'email_new' => 'new_' . $user->email,
			'code' => $code,
		]);

		$response = $this->getJson('web/api/change/email/recover/' . $user->id . '/' . $code);

		$response->assertStatus(200)->assertJson([
			'message' => 'Email address has been updated. Refresh panel page.',
		]);
	}
}
