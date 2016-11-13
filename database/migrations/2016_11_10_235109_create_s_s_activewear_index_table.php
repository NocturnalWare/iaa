<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSSActivewearIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_s_activewear_index', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('base_id')->default(0);
            $table->integer('product_id')->default(0);
            $table->string('color_name')->default('');
            $table->string('size_name')->default('');
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
        Schema::drop('s_s_activewear_index');
    }
}
