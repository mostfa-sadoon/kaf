<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Semesterstranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('semestertranslations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('semester_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['semester_id', 'locale']);
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
