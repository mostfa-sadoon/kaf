<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->text('password')->nullable();
            $table->string('national_id')->unique();
            $table->string('Bank_account_number')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('photo')->nullable();
            //this refer to type id in usertype table
            $table->integer('usertype')->default(1);
            $table->text('fcm_token')->nullable();
            $table->boolean('mobile_id')->comment('0 for android, 1 for ios')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
