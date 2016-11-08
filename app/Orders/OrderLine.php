<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;
use App\SSActivewear\SSActivewearProduct;
class OrderLine extends Model
{
    protected $fillable = [
        'color_name',
        'color_1',
        'color_2',
        'size',
    ];

    /**
     * Description
     *
     * @return void
     */
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function linePrice()
    {
    	return;
    }

    /**
     * Description
     *
     * @return void
     */
    public function product()
    {
    	return $this->belongsTo(SSActivewearProduct::class);
    }
    
    
    /**
     * Description
     *
     * @return void
     */
    public function otherSizes()
    {
    	$products = [];
    	$otherLines = OrderLine::where('order_id', $this->order_id)->pluck('product_id');

    	if(!empty($this->product_id)){
    		$products = SSActivewearProduct::select('size_name')
    			->distinct()
    			->whereNotIn('id', $otherLines)
	    		->where('brand_name', $this->product->brand_name)
	    		->where('style_id', $this->product->style_id)
	    		->where('color_code', $this->product->color_code)
	    		->pluck('size_name')
	    		->toArray();
	   	}

    	return $products;
    }
    
    
}
