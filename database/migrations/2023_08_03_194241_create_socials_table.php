<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('socials', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->string('name', 50);
			$table->string('icon', 50)->nullable(true);
			$table->text('url');
			$table->unsignedBigInteger('sort')->default(0);
			$table->timestamps();
			$table->unique(['user_id', 'name']);
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->cascadeOnUpdate()
				->cascadeOnDelete();
			// ->nullOnDelete();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('profiles');
	}
};
