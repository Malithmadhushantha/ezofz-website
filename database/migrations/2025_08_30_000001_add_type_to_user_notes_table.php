<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToUserNotesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_notes', function (Blueprint $table) {
            $table->string('type')->after('section_id'); // This will be 'penal-code' or 'criminal-procedure-code'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_notes', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
