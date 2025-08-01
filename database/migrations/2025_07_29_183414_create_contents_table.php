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
		Schema::create('contents', function (Blueprint $table)
		{
			$table->id();
			$table->foreignId('course_id')->nullable()->constrained('courses')->onDelete('cascade');
			$table->foreignId('module_id')->nullable()->constrained('modules')->onDelete('cascade');
			$table->string('title')->nullable();
			$table->string('source')->nullable();
			$table->string('url')->nullable();
			$table->string('length')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('contents');
	}
};
