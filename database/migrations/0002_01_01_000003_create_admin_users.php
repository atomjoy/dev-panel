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
		if (Config::get('default.super_admin_email') != false) {
			// Super Admin
			$superadmin = Admin::create([
				'name' => 'Super Admin',
				'email' => Config::get('default.super_admin_email', 'superadmin@example.com'),
				'password' => Config::get('default.super_admin_password', 'Password123#'),
				'username' => 'superadmin',
			]);

			$superadmin->email_verified_at = now();
			$superadmin->is_admin = 1;
			$superadmin->save();

			$superadmin->assignRole('super_admin');
		}

		if (Config::get('default.admin_email') != false) {
			// Admin
			$admin = Admin::create([
				'name' => 'Admin',
				'email' => Config::get('default.admin_email', 'admin@example.com'),
				'password' => Config::get('default.admin_password', 'Password123#'),
				'username' => 'admin',
			]);

			$admin->email_verified_at = now();
			$admin->is_admin = 1;
			$admin->save();

			$admin->assignRole('admin');
		}

		if (Config::get('default.worker_email') != false) {
			// Worker
			$worker = Admin::create([
				'name' => 'Worker',
				'email' => Config::get('default.worker_email', 'worker@example.com'),
				'password' => Config::get('default.worker_password', 'Password123#'),
				'username' => 'worker',
			]);

			$worker->email_verified_at = now();
			$worker->is_admin = 1;
			$worker->save();

			$worker->assignRole('worker');
		}
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		//
	}
};
