<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderLineSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_line_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_line_id')->default(0);
            $table->integer('base_id')->default(0);
            $table->integer('product_id')->default(0);
            $table->string('color_name')->default('');
            $table->string('size_name')->default('');
            $table->integer('quantity')->default(24);
            $table->integer('markup')->default(40);
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
        Schema::drop('order_line_sizes');
    }
}
