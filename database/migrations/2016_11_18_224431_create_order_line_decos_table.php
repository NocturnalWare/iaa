<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderLineDecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_line_decos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_line_id')->default(0);
            $table->integer('art_id')->default(0);
            $table->string('location_name')->default('');
            $table->text('colors')->nullable();
            $table->double('size')->default(0.0);
            $table->integer('screens')->default(1)->nullable();
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
        Schema::drop('order_line_decos');
    }
}
