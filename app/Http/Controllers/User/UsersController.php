<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    /**
     * Description
     *
     * @return void
     */
    public function index()
    {
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }
    
}
