<?php

namespace App\SSActivewear;

use Illuminate\Database\Eloquent\Model;
use App\SSActivewear\SSActivewearBrand;
use App\SSActivewear\SSActivewearProduct;
use App\SSActivewear\SSActivewearCategory;

class SSActivewearStyle extends Model
{
	protected $fillable = [
		'external_style_id',
		'base_category',
		'part_number',
		'brand_name',
		'style_name',
		'title',
		'description',
		'style_image',
	];

	/**
	 * Description
	 *
	 * @return void
	 */
	public function brand()
	{
		return $this->belongsTo(SSActivewearBrand::class);
	}
	
	/**
	 * Description
	 *
	 * @return void
	 */
	public function products()
	{
		return $this->hasMany(SSActivewearProduct::class, 'style_id', 'external_style_id');
	}

	/**
	 * Description
	 *
	 * @return void
	 */
	public function category()
	{
		return $this->belongsToMany(SSActivewearCategory::class);
	}
	
	
}
