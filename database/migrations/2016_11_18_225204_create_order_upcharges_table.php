<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderUpchargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_line_upcharges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->default(0);
            $table->string('upcharge_name')->default('');
            $table->double('markup_per_unit')->default(0.0);
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
        Schema::drop('order_line_upcharges');
    }
}
