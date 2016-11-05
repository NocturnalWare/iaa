<?php

namespace App\SSActivewear;

use Illuminate\Database\Eloquent\Model;
use App\SSActivewear\SSActivewearStyle;
use App\SSActivewear\SSActivewearProduct;

class SSActivewearBrand extends Model
{
    protected $fillable = ['name'];

    /**
     * Description
     *
     * @return void
     */
    public function styles()
    {
    	return $this->hasMany(SSActivewearStyle::class, 'brand_id');
    }

    /**
     * Description
     *
     * @return void
     */
    public function products()
    {
    	return $this->hasMany(SSActivewearProduct::class, 'brand_id');
    }
    
}
