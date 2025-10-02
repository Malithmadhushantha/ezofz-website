<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('police_stations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained('police_divisions')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('oic_mobile')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('police_stations');
    }
};
