<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSSActivewearBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_s_activewear_base', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name')->default('');
            $table->integer('style_id')->default(0);
            $table->integer('brand_id')->default(0);
            $table->string('color_name')->default('');
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
        Schema::drop('s_s_activewear_base');
    }
}
