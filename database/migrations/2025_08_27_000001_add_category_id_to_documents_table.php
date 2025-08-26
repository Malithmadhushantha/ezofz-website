<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('documents', 'category_id')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->unsignedBigInteger('category_id')->nullable()->after('id');
                $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('documents', 'category_id')) {
            Schema::table('documents', function (Blueprint $table) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            });
        }
    }
};
