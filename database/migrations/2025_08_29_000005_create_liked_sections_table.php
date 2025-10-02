<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikedSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('liked_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('section_id')->constrained('penal_code_sections')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'section_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('liked_sections');
    }
}
