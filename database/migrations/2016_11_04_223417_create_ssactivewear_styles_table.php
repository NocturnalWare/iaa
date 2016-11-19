<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSsactivewearStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_s_activewear_styles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('external_style_id');
            $table->string('base_category');
            $table->string('part_number');
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->string('style_name');
            $table->string('title');
            $table->text('description');
            $table->string('style_image');
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
        Schema::drop('s_s_activewear_styles');
    }
}
