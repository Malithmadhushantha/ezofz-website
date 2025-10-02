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
		Schema::create('criminal_procedure_code_liked_sections', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('criminal_procedure_codes_section_id');
			$table->timestamps();

			$table->foreign('user_id', 'cpc_liked_user_fk')
				->references('id')->on('users')->onDelete('cascade');
			$table->foreign('criminal_procedure_codes_section_id', 'cpc_liked_section_fk')
				->references('id')->on('criminal_procedure_codes')->onDelete('cascade');
			$table->unique(['user_id', 'criminal_procedure_codes_section_id'], 'cpc_liked_user_section_unique');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('criminal_procedure_code_liked_sections');
	}
};
