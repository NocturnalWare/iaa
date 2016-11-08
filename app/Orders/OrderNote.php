<?php

namespace App\Orders;

use Illuminate\Database\Eloquent\Model;

class OrderNote extends Model
{
    protected $fillable = [
		'subject',
        'message',
    ];

    protected $with = [
    	'user',
    	'comments',
    ];

    protected $appends = ['is_editing'];

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
    public function getIsEditingAttribute()
    {
    	return $this->attributes['is_editing'] = false;
    }

    /**
     * Description
     *
     * @return void
     */
    public function comments()
    {
    	return $this->hasMany(OrderComment::class, 'message_id');
    }

    /**
     * Description
     *
     * @return void
     */
    public function order()
    {
    	return $this->belongsTo(Order::class);
    }
    
}
