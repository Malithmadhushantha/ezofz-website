<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penal_code_amendments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('penal_code_sections')->onDelete('cascade');
            $table->string('amendment_number');
            $table->date('amendment_date');
            $table->text('amendment_content');
            $table->text('illustrations_1')->nullable();
            $table->text('illustrations_2')->nullable();
            $table->text('illustrations_3')->nullable();
            $table->text('explanation_1')->nullable();
            $table->text('explanation_2')->nullable();
            $table->text('explanation_3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penal_code_amendments');
    }
};
