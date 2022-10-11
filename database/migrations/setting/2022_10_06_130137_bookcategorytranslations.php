<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bookcategorytranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bookcategorytranslations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('bookcategory_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['bookcategory_id', 'locale']);
            $table->foreign('bookcategory_id')->references('id')->on('bookcategories')->onDelete('cascade');
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
