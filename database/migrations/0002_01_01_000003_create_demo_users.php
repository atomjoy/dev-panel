<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		// Demo user
		$user = User::create([
			'name' => 'Demo Alex',
			'email' => Config::get('default.demo_email', 'demo@example.com'),
			'password' => Config::get('default.demo_password', 'Password123#'),
			'username' => 'demo',
			'mobile' => '+48100200300'
		]);

		$user->email_verified_at = now();
		$user->save();
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		//
	}
};
