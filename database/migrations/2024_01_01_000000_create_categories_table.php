<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
            });
        }

        if (Schema::hasTable('documents')) {
            Schema::table('documents', function (Blueprint $table) {
                if (!Schema::hasColumn('documents', 'category_id')) {
                    $table->unsignedBigInteger('category_id')->nullable()->after('id');
                    $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
                }
                if (Schema::hasColumn('documents', 'category')) {
                    $table->dropColumn('category');
                }
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('documents')) {
            Schema::table('documents', function (Blueprint $table) {
                if (!Schema::hasColumn('documents', 'category')) {
                    $table->string('category')->nullable();
                }
                if (Schema::hasColumn('documents', 'category_id')) {
                    $table->dropForeign(['category_id']);
                    $table->dropColumn('category_id');
                }
            });
        }
        if (Schema::hasTable('categories')) {
            Schema::dropIfExists('categories');
        }
    }
};
