<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantity_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('color');
            $table->double('tier_1')->default(0.0);
            $table->double('tier_2')->default(0.0);
            $table->double('tier_3')->default(0.0);
            $table->double('tier_4')->default(0.0);
            $table->double('tier_5')->default(0.0);
            $table->double('tier_6')->default(0.0);
            $table->double('tier_7')->default(0.0);
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
        Schema::drop('prices');
    }
}
