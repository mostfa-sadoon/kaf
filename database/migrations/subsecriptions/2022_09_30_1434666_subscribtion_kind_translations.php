<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubscribtionKindTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribtion_kind_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscribtion_kind_id');
            $table->string('locale');
            $table->string('name');

            // $table->unique(['subscribtion_kind_id', 'locale']);
            $table->foreign('subscribtion_kind_id')->references('id')->on('subscribtions_kinds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_translations');
    }
}
