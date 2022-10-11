<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subscribtions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('subscribtions', function (Blueprint $table) {
            $table->id();
            $table->enum('type',[1,2,3])->comment("1 : weekly , 2 : monthly , 3 : yearly");
            $table->unsignedBigInteger('user_id');
            $table->enum('user_type',[1,2,3])->comment("1 : user , 2 : teacher , 3 : admin");
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status',[1,0]);
            $table->unsignedBigInteger('subscribtion_kind_id');
            $table->foreign('subscribtion_kind_id')->references('id')->on('subscribtions_kinds')->onDelete('cascade');
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
