<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryProductTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('category__product', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                    ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['category_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('category__product');
    }

}
