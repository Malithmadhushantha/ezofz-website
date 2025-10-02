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
        Schema::create('criminal_procedure_code_starred_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('criminal_procedure_codes_section_id');
            $table->foreign('criminal_procedure_codes_section_id', 'cpc_starred_section_foreign')
                  ->references('id')
                  ->on('criminal_procedure_codes')
                  ->onDelete('cascade');
            $table->timestamps();

            // Ensure a user can only star a section once
            $table->unique(
                ['user_id', 'criminal_procedure_codes_section_id'],
                'cpc_starred_user_section_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criminal_procedure_code_starred_sections');
    }
};
