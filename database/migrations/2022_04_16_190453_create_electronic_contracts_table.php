<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectronicContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electronic_contracts', function (Blueprint $table) {
            $table->id();
            $table->integer('contract_number');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->string('CRecord');
            $table->string('company_name');
            $table->text('Brief_description');
            $table->date('contract_date');
            $table->date('date_start');
            $table->date('date_end');
            $table->tinyInteger('renewable');
            $table->string('amount');
            $table->string('first_batch');
            $table->string('second_batch');
            $table->string('third_batch');
            $table->string('final_batch');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('description');
            $table->string('Contract_file');
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
        Schema::dropIfExists('electronic_contracts');
    }
}
