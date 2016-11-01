<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Description
     *
     * @return void
     */
    public function edit()
    {
    	$user = \Auth::user();

    	return view('user.edit', compact('user'));
    }

    /**
     * Description
     *
     * @return void
     */
    public function update()
    {
    	return view('user.edit');
    }
    
}
