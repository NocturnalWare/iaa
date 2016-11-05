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
            $table->text('line_text');
            $table->integer('xsmall_qty');
            $table->integer('small_qty');
            $table->integer('medium_qty');
            $table->integer('large_qty');
            $table->integer('xlarge_qty');
            $table->integer('xxlarge_qty');
            $table->integer('xxxlarge_qty');
            $table->double('line_price');
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
