<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('supply_date'); 
            $table->date('invoice_date');
            $table->string('customer_name');
            $table->string('address');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('TaxNumber');
            $table->string('responsible');
            $table->bigInteger('contracts_id')->unsigned()->nullable();
            $table->foreign('contracts_id')->references('id')->on('electronic_contracts')->onDelete('cascade');
            $table->string('phone');
            $table->string('email');
            $table->string('Bank_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('IBAN');
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
        Schema::dropIfExists('invoices');
    }
}
