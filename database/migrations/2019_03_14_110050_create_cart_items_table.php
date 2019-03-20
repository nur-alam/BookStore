<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('order_id')->unsigned()->nullable();
            $table->integer('book_id')->unsigned();
            $table->integer('qty');
            $table->integer('price')->nullable();
            $table->tinyInteger('is_order')->default(0);
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade');
            $table->foreign('book_id')
                ->references('id')->on('books')
                ->onUpdate('cascade');
            $table->foreign('order_id')
                ->references('id')->on('orders')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
}
