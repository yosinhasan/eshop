<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('rates', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('product_id')->unsigned()->index();
            $table->tinyInteger('rate')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['user_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('rates');
    }

}
