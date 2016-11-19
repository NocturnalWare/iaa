<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;
use App\SSActivewear\SSActivewearBase;
class OrderLine extends Model
{
    protected $fillable = [
        'color_name',
        'color_1',
        'color_2',
        'size',
    ];

    protected $with = ['base', 'decos'];

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
        return $this->belongsTo(SSActivewearBase::class, 'order_base_id', 'id');
    }

    /**
     * Description
     *
     * @return void
     */
    public function decos()
    {
        return $this->hasMany(OrderDeco::class);
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
