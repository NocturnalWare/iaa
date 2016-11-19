<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;
use App\SSActivewear\SSActivewearBase;
use App\SSActivewear\SSActivewearIndex;
use App\SSActivewear\SSActivewearStyle;

class OrderBase extends Model
{
	protected $with = ['base'];
	protected $appends = ['showPanel'];
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
    public function base()
    {
    	return $this->belongsTo(SSActivewearBase::class, 'base_id', 'id');
    }

    /**
     * Description
     *
     * @return void
     */
    public function getshowPanelAttribute()
    {
    	return $this->attributes['showPanel'] = 'product';
    }
    
    
}
