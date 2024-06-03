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
		// line1 , line2 , city , state , postal_code , country
		Schema::create('addresses', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->string('line1', 50)->nullable();
			$table->string('line2', 50)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('state', 50)->nullable();
			$table->string('country', 50)->nullable();
			$table->string('postal_code', 50)->nullable();
			$table->boolean('private')->nullable()->default(true);
			$table->timestamps();
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
		Schema::dropIfExists('addresses');
	}
};
