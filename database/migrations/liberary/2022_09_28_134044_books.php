<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Books extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('owner_type');
            $table->string('owner_id');
            $table->string('file')->unique();
            $table->string('img')->unique();
            $table->enum('status',['new','certificied']);
            $table->string('price')->nullable();
            $table->unsignedBigInteger('price_id');
            $table->foreign('price_id')->references('id')->on('pricesettings')->onDelete('cascade');
            $table->integer('bookcategory_id')->unsigned();
            $table->foreign('bookcategory_id')->references('id')->on('bookcategories')->onDelete('cascade');
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->integer('fileextension_id')->unsigned();
            $table->foreign('fileextension_id')->references('id')->on('fileextensions')->onDelete('cascade');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->integer('semester_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->integer('acadimicyear_id')->unsigned()->nullable();
            $table->foreign('acadimicyear_id')->references('id')->on('acadimicyears')->onDelete('cascade');
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
        //
    }
}
