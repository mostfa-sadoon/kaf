<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Acadimicyearstranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('acadimicyearstranslations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('acadimicyear_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['acadimicyear_id', 'locale']);
            $table->foreign('acadimicyear_id')->references('id')->on('acadimicyears')->onDelete('cascade');
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
