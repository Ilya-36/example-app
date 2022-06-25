<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('library_card_id')->unsigned();
            $table->foreign('library_card_id')->references('id')->on('library_cards');
            //$table->bigInteger('library_card_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            //$table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('total_price')->unsigned();
            $table->date('created');
            $table->date('date_return');
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
        Schema::dropIfExists('orders');
    }
}
