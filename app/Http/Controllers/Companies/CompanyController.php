<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Utilities\Utility;
use App\Profiles\Company;
use App\Profiles\CompanyProfile;

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
    	\JavaScript::put([
    		'companies' => $companies,
    	]);
    	
    	return view('companies.index', compact('companies'));
    }    

    /**
     * Description
     *
     * @return void
     */
    public function edit(Company $company)
    {
    	return view('companies.edit', compact('company'));
    }

    /**
     * Description
     *
     * @return void
     */
    public function create()
    {
    	return view('companies.create');
    }

    /**
     * Description
     *
     * @return void
     */
    public function store(Request $request)
    {
    	$newcompany = Company::create([
    		'name' => $request->get('name'),
    		'industry' => $request->get('industry'),
    	]);

    	$newcompany->profile()->save(new CompanyProfile([
    		'email' => $request->get('email'),
    		'phone' => $request->get('phone'),
    		'street_1' => $request->get('street1'),
    		'city' => $request->get('city'),
    		'state' => $request->get('state'),
    		'zip' => $request->get('zip'),
    		'country' => $request->get('country')
    	]));

    	return redirect()->route('companies.index');
    }
    
}
