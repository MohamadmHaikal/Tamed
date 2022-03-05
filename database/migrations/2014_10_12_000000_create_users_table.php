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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('description');
            $table->string('email')->unique();
            $table->string('v-code')->nullable();
            $table->string('password');
            $table->float('evaluation');
            $table->integer('projectCount');
            $table->integer('clientCount');
            $table->integer('seenCount');
            $table->string('logo');
            $table->text('activityArray');
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
