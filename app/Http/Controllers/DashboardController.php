<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Profiles\Company;
use App\Profiles\UserRole;
use App\Utilities\Utility;

class DashboardController extends Controller
{
	use Utility;

    /**
     * Description
     *
     * @return void
     */
    public function index()
    {
    	$companies = [];
    	if($this->findGod()){
    		$companies = Company::all();
    	}
    	
    	return view('dashboard.index', compact('companies'));
    }
    
}
