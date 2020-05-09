<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemsToOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_to_order', function (Blueprint $table) {
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->foreignId('item_id')->references('id')->on('items');
            $table->integer('quantity');
            $table->double('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_to_order');
    }
}
