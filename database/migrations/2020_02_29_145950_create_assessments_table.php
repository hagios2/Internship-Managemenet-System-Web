<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('application_id')->unsigned()->unique();
            $table->integer('supervisor_id')->unsigned();
            $table->integer('cordinator_id')->unsigned()->nullable();
            $table->string('understanding_of_company_business')->nullable();
            $table->string('technical_abilities')->nullable();
            $table->string('general_impression')->nullable();
            $table->text('sectionA_comment')->nullable();
         /*    $table->integer('relevance_scale')->unsigned()->nullable(); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}
