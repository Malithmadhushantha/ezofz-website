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
        Schema::table('documents', function (Blueprint $table) {
            // Add new file path columns for different file types
            $table->string('pdf_file_path')->nullable()->after('file_path');
            $table->string('word_file_path')->nullable()->after('pdf_file_path');
            $table->string('excel_file_path')->nullable()->after('word_file_path');

            // Add file size columns for tracking
            $table->integer('pdf_file_size')->nullable()->after('excel_file_path');
            $table->integer('word_file_size')->nullable()->after('pdf_file_size');
            $table->integer('excel_file_size')->nullable()->after('word_file_size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'pdf_file_path',
                'word_file_path',
                'excel_file_path',
                'pdf_file_size',
                'word_file_size',
                'excel_file_size'
            ]);
        });
    }
};
