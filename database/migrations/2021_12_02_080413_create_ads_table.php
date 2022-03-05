<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('title');
            $table->string('description');
            $table->string('city');
            $table->string('neighborhood');
            $table->float('price');
            $table->boolean('pricestatus');
            $table->boolean('onMap');
            $table->double('lng');
            $table->double('lat');
            $table->date('deadline');
            $table->date('startdate');
            $table->integer('seenCount');
            $table->integer('QuotesCount');
            $table->text('infoArray');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('activitie_id')->unsigned();
            $table->foreign('activitie_id')->references('id')->on('activities')->onDelete('cascade');
           
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
        Schema::dropIfExists('ads');
    }
}
