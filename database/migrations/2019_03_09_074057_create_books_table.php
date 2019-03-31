<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->text('desc');
            $table->integer('author_id')->unsigned();
            $table->integer('category_id')->unsigned()->comment('book_category_id');
            $table->string('image');
            $table->tinyInteger('is_available')->default(1);
            $table->integer('quantity');
            $table->tinyInteger('status')->default(1);
            $table->timestamp('published_at')->default(now());
            $table->timestamps();
            $table->foreign('author_id')
                ->references('id')->on('authors')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')
                ->references('id')->on('book_categories')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
