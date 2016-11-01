<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    /**
     * Description
     *
     * @return void
     */
    public function index()
    {
    	return view('dashboard.index');
    }
    
}
