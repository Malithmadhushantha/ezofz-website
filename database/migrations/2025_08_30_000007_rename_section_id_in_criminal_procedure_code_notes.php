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
		// Example: Rename column 'section_id' to 'criminal_procedure_codes_section_id' if needed
		if (Schema::hasColumn('criminal_procedure_code_notes', 'section_id')) {
			Schema::table('criminal_procedure_code_notes', function (Blueprint $table) {
				$table->renameColumn('section_id', 'criminal_procedure_codes_section_id');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		if (Schema::hasColumn('criminal_procedure_code_notes', 'criminal_procedure_codes_section_id')) {
			Schema::table('criminal_procedure_code_notes', function (Blueprint $table) {
				$table->renameColumn('criminal_procedure_codes_section_id', 'section_id');
			});
		}
	}
};
