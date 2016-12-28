<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class OrderLineSize extends Model
{
	protected $fillable = [
		'size_name',
		'quantity',
		'price'
	];

    /**
     * Description
     *
     * @return void
     */
    public function line()
    {
    	return $this->belongsTo(OrderLine::class);
    }
    
}
