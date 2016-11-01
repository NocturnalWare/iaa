<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utilities\Utility;
use App\Profiles\Company;

class CompanyController extends Controller
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
    	
    	return view('companies.index', compact('companies'));
    }
    
}
