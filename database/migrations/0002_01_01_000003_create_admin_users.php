<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		// Super Admin
		$superadmin = Admin::create([
			'name' => 'Super Admin',
			'email' => Config::get('atomjoy.super_admin_email', 'superadmin@example.com'),
			'password' => Config::get('super_admin_password', 'Password123#'),
			'username' => 'superadmin',
		]);

		$superadmin->email_verified_at = now();
		$superadmin->is_admin = 1;
		$superadmin->save();

		$superadmin->assignRole('super_admin');

		// Admin
		$admin = Admin::create([
			'name' => 'Admin',
			'email' => Config::get('atomjoy.admin_email', 'admin@example.com'),
			'password' => Config::get('admin_password', 'Password123#'),
			'username' => 'admin',
		]);

		$admin->email_verified_at = now();
		$admin->is_admin = 1;
		$admin->save();

		$admin->assignRole('admin');

		// Worker
		$worker = Admin::create([
			'name' => 'Worker',
			'email' => Config::get('atomjoy.worker_email', 'worker@example.com'),
			'password' => Config::get('worker_password', 'Password123#'),
			'username' => 'worker',
		]);

		$worker->email_verified_at = now();
		$worker->is_admin = 1;
		$worker->save();

		$worker->assignRole('worker');
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		//
	}
};
