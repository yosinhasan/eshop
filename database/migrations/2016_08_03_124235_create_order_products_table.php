<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned()->index();
            $table->bigInteger('order_id')->unsigned()->index();
            $table->decimal('price');
            $table->integer('amount')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['order_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('order_products');
    }

}
