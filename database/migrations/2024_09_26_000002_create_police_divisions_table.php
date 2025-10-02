<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('police_divisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('police_provinces')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('police_divisions');
    }
};
