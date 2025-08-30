<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalProcedureCodeAmendmentsTable extends Migration
{
    public function up()
    {
        Schema::create('criminal_procedure_code_amendments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criminal_procedure_code_id');
            $table->foreign('criminal_procedure_code_id', 'cpc_amendments_section_foreign')
                  ->references('id')
                  ->on('criminal_procedure_codes')
                  ->onDelete('cascade');
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
        });
    }

    public function down()
    {
        Schema::dropIfExists('criminal_procedure_code_amendments');
    }
}
