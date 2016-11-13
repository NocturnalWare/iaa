<?php

namespace App\SSActivewear;

use Illuminate\Database\Eloquent\Model;

class SSActivewearIndex extends Model
{
	protected $table = 's_s_activewear_index';

    protected $fillable = [
        'product_id',
        'base_id',
        'size_name',
        'color_name'
    ];

    protected $with = ['product'];

    protected $appends = ['margin', 'qty'];

    /**
     * Description
     *
     * @return void
     */
    public function product()
    {
    	return $this->belongsTo(SSActivewearProduct::class, 'product_id', 'id');
    }

    public function base(){
    	return $this->belongsTo(SSActivewearBase::class, 'id', 'base_id');
    }

    /**
     * Description
     *
     * @return void
     */
    public function getMarginAttribute()
    {
    	return $this->attributes['margin'] = 40;
    }

    /**
     * Description
     *
     * @return void
     */
    public function getQtyAttribute()
    {
    	return $this->attributes['qty'] = 24;
    }
    
}
