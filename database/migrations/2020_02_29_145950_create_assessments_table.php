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
            $table->integer('student_id')->unsigned()->unique();
            $table->integer('supervisor_id')->unsigned();
            $table->integer('cordinator_id')->unsigned()->nullable();
            $table->string('interns_understanding_of_companys_business')->nullable();
            $table->string('interns_technical_abilities')->nullable();
            $table->string('general_impression_about_intern')->nullable();
            $table->text('additional_comment_about_intern')->nullable();
            $table->text('quality_of_internship_report')->nullable();
            $table->string('working_attitude_and_discipline')->nullable();
            $table->string('productivity_and_quality_of_work')->nullable();
            $table->string('knowledge_and_problem_solving_skills')->nullable();
            $table->string('technical_skills_in_using_engineering_tools')->nullable();
            $table->string('verbal_and_written_communication_skills')->nullable();
            $table->string('teamwork_and_leadership_skills')->nullable();
            $table->string('ability_to_learn_new_knowledge_and_skills')->nullable();
            $table->text('section_c_additional_comments')->nullable();
            $table->text('section_D_additional_comments')->nullable();
            $table->boolean('hiring_interest')->nullable();
            $table->integer('no_of_students')->unsigned()->nullable();
            $table->text('reason')->nullable();
            $table->string('filled_assessment_form')->nullable();
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
