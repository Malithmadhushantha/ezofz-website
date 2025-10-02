<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalProcedureCodesTable extends Migration
{
    public function up()
    {
        Schema::create('criminal_procedure_codes', function (Blueprint $table) {
            $table->id();
            $table->string('chapter_name');
            $table->string('sub_chapter_name')->nullable();
            $table->string('section_number');
            $table->string('sub_section_number')->nullable();
            $table->string('name_of_the_section');
            $table->text('section_content');
            $table->text('illustrations_1')->nullable();
            $table->text('illustrations_2')->nullable();
            $table->text('illustrations_3')->nullable();
            $table->text('explanation_1')->nullable();
            $table->text('explanation_2')->nullable();
            $table->text('explanation_3')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('criminal_procedure_codes');
    }
}
