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
        Schema::create('criminal_procedure_code_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('criminal_procedure_codes_section_id');
            $table->text('note');
            $table->timestamps();

            $table->foreign('criminal_procedure_codes_section_id', 'cpc_notes_section_foreign')
                  ->references('id')
                  ->on('criminal_procedure_codes')
                  ->onDelete('cascade');

            // Ensure a user can only have one note per section
            $table->unique(
                ['user_id', 'criminal_procedure_codes_section_id'],
                'cpc_notes_user_section_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criminal_procedure_code_notes');
    }
};
