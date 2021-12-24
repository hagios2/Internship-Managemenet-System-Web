<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned(); //for only students with approved internship applicatiojnn
            $table->integer('supervisor_id')->unsigned()->nullable();
            $table->boolean('on_premises')->nullable();
            $table->boolean('off_premises')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->boolean('approved_by_supervisor')->nullable();
            $table->timestamp('check_in_timestamp')->nullable();
            $table->timestamp('check_out_timestamp')->nullable();
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
        Schema::dropIfExists('interns');
    }
}
