<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders\OrderNote;
use App\Orders\OrderComment;
use App\Http\Requests\SaveCommentRequest;

class OrderCommentsController extends Controller
{
    /**
     * Description
     *
     * @return void
     */
    public function store(SaveCommentRequest $request)
    {
    	$newcomment = new OrderComment(['comment' => $request->get('comment')]);
    	$newcomment->user()->associate(\Auth::user());
    	$order = OrderNote::find($request->get('orderNote'));
    	$order->comments()->save($newcomment);

    	return $newcomment;
    }

    /**
     * Description
     *
     * @return void
     */
    public function update(Request $request)
    {
    	$orderComment = OrderComment::find($request->get('orderComment'));
    	$orderComment->update(['comment' => $request->get('comment')]);

    	return 200;
    }
    
}
