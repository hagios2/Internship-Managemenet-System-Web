<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->unsigned()->unique();
            $table->integer('company_id')->nullable();
            $table->string('preferred_company_name')->nullable();
            $table->string('preferred_company_location')->nullable();
            $table->string('preferred_company_city')->nullable();
            $table->string('preferred_company_email')->nullable();
            $table->float('preferred_company_latitude', 0, 6)->nullable();
            $table->float('preferred_company_longitude', 0, 6)->nullable();
            $table->string('phone')->unique()->nullable();
            $table->boolean('default_application')->nullable();
            $table->boolean('preferred_company')->nullable();
            $table->boolean('open_letter')->nullable();
            $table->string('resume')->nullable();
            $table->date('started_at')->nullable();
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
        Schema::dropIfExists('internship_applications');
    }
}
