<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('borrow_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->tinyInteger('is_borrow')->default(0);
            $table->tinyInteger('disable')->default(0);
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
        Schema::dropIfExists('borrow_lists');
    }
}
