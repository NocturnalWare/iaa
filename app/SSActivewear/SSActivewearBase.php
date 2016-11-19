<?php

namespace App\SSActivewear;

use Illuminate\Database\Eloquent\Model;

class SSActivewearBase extends Model
{
	protected $table = 's_s_activewear_base';
    protected $fillable = [
    	'product_name',
    	'brand_id',
    	'style_id',
    	'color_name'
    ];

    protected $with = ['index', 'style'];
    /**
     * Description
     *
     * @return void
     */
    public function index()
    {
    	return $this->hasMany(SSActivewearIndex::class, 'base_id', 'id');
    }

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
    public function base()
    {
    	return $this->hasMany(OrderBase::class, 'base_id', 'id');
    }
    
    /**
     * Description
     *
     * @return void
     */
    public function lines()
    {
    	return $this->hasMany(OrderLine::class, 'id', 'order_base_id');
    }
    
}
