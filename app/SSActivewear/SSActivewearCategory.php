<?php

namespace App\SSActivewear;

use Illuminate\Database\Eloquent\Model;
use App\SSActivewear\SSActivewearStyle;

class SSActivewearCategory extends Model
{
    protected $fillable = ['name'];

    /**
     * Description
     *
     * @return void
     */
    public function styles()
    {
    	return $this->hasMany(SSActivewearStyle::class, 'category_id');
    }
    
    /**
     * Description
     *
     * @return void
     */
    public function imageURL()
    {
    	return 'https://www.ssactivewear.com/'.$this->image_url;
    }
    
}
