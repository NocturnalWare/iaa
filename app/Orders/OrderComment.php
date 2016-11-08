<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class OrderComment extends Model
{
    protected $fillable = ['comment'];

    protected $appends = ['is_editing'];

    protected $with = ['user'];

    /**
     * Description
     *
     * @return void
     */
    public function user()
    {
    	return $this->belongsTo(\App\User::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function message()
    {
    	return $this->belongsTo(OrderMessage::class);
    }

    /**
     * Description
     *
     * @return void
     */
    public function getIsEditingAttribute()
    {
    	return $this->attributes['is_editing'] = false;
    }
    
    
}
