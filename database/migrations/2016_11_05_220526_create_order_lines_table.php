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
            $table->integer('base_id')->nullable();
            $table->string('blank_name')->nullable();
            $table->string('design_name')->default('');
            $table->string('blank_colors')->default('');
            $table->string('ink_colors')->default('');
            $table->integer('screen_count')->default(0);
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
