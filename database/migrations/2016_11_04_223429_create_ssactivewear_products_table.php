<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSsactivewearProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_s_activewear_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('style_id');
            $table->string('external_sku');
            $table->string('external_skuID_Master');
            $table->string('your_sku');
            $table->string('brand_name');
            $table->string('style_name');
            $table->string('color_name');
            $table->string('color_code');
            $table->string('color_price_code_name');
            $table->string('color_group');
            $table->string('color_group_name');
            $table->integer('color_family_id');
            $table->string('color_family');
            $table->string('color_swatch_image');
            $table->string('color_front_image');
            $table->string('color_side_image');
            $table->string('color_back_image');
            $table->string('color_1');
            $table->string('color_2');
            $table->string('size_name');
            $table->string('size_code');
            $table->string('size_order');
            $table->string('size_price_code_name');
            $table->integer('case_qty');
            $table->double('unit_weight');
            $table->double('piece_price');
            $table->double('dozen_price');
            $table->double('case_price');
            $table->double('sale_price');
            $table->double('customer_price');
            $table->integer('qty');
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
        Schema::drop('s_s_activewear_products');
    }
}
