<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemsToCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_to_cart', function (Blueprint $table) {
            $table->foreignId('cart_id')->references('id')->on('cart')
            ->onDelete('cascade');;
            $table->foreignId('item_id')->references('id')->on('items')
            ->onDelete('cascade');;
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_to_cart');
    }
}
