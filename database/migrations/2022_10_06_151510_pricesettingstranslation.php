<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pricesettingstranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pricesettingtranslations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('pricesetting_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['pricesetting_id', 'locale']);
            $table->foreign('pricesetting_id')->references('id')->on('pricesettings')->onDelete('cascade');
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
