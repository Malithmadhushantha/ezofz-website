<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('documents', 'category')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }
    }

    public function down()
    {
        if (!Schema::hasColumn('documents', 'category')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->string('category')->nullable();
            });
        }
    }
};
