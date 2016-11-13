<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderLinesTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id')->nullable();
            $table->text('line_text');
            $table->string('color_name');
            $table->string('color_1');
            $table->string('color_2');
            $table->string('size');
            $table->integer('qty')->default(0);
            $table->integer('margin')->default(40);
            $table->double('line_price')->nullable();
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
        Schema::drop('order_lines');
    }
}
