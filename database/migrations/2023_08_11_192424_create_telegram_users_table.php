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
		Schema::create('telegram_users', function (Blueprint $table) {
			$table->bigInteger('id')->unique(); // id gets from telegram
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('username', 50);
			$table->string('photo_url', 255);
			$table->foreignId('user_id')->constrained();
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('telegram_users');
	}
};
