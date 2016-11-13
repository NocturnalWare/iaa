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

	protected $with = ['brand'];

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
	public function base()
	{
		return $this->hasMany(SSActivewearBase::class, 'style_id', 'external_style_id');
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
