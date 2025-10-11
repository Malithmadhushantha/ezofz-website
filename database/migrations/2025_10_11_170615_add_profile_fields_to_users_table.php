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
        Schema::table('users', function (Blueprint $table) {
            // Only add columns that don't exist yet
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable()->after('avatar');
            }
            if (!Schema::hasColumn('users', 'bio')) {
                $table->text('bio')->nullable()->after('address');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['address', 'bio']);
        });
    }
};
