<?php

namespace App\SSActivewear;

use Illuminate\Database\Eloquent\Model;
use App\SSActivewear\SSActivewearStyle;

class SSActivewearProduct extends Model
{
    protected $fillable = [
    	'style_id',
        'external_sku',
        'external_skuID_Master',
        'your_sku',
        'brand_name',
        'style_name',
        'color_name',
        'color_code',
        'color_price_code_name',
        'color_group',
        'color_group_name',
        'color_family_id',
        'color_family',
        'color_swatch_image',
        'color_front_image',
        'color_side_image',
        'color_back_image',
        'color_1',
        'color_2',
        'size_name',
        'size_code',
        'size_order',
        'size_price_code_name',
        'case_qty',
        'unit_weight',
        'piece_price',
        'dozen_price',
        'case_price',
        'sale_price',
        'customer_price',
        'qty',
    ];

    protected $with = ['style'];

    /**
     * Description
     *
     * @return void
     */
    public function style()
    {
    	return $this->belongsTo(SSActivewearStyle::class, 'style_id', 'external_style_id');
    }

    /**
     * Description
     *
     * @return void
     */
    public function buildLineText()
    {
    	$line = $this->brand_name.' '.$this->style_name.' '.$this->color_name.' '.$this->size_name;
    	
    	return;
    }
    
    
}
