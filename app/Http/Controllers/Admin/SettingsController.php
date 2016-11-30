<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calculations\QuantityPrice;
use App\Calculations\Upcharge;
class SettingsController extends Controller
{
    /**
     * Description
     *
     * @return void
     */
    public function index()
    {
    	$prices = QuantityPrice::all();
        $upcharges = Upcharge::all();
        
    	\JavaScript::put([
    		'prices' => $prices,
            'upcharges' => $upcharges,
    	]);
    	return view('admin.settings.index', compact('prices'));
    }

    /**
     * Description
     *
     * @return void
     */
    public function updateUpcharges(Request $request)
    {
        foreach($request->get('upcharges') as $upcharge){
            $inject = Upcharge::find($upcharge['id']);
            $inject->per_unit = $upcharge['per_unit'];
            $inject->markup_rate = $upcharge['markup_rate'];
            $inject->save();
        }

        return 200;
    }

    /**
     * Description
     *
     * @return void
     */
    public function update(Request $request)
    {
    	foreach($request->get('prices') as $price){
    		$inject = QuantityPrice::find($price['id']);
    		$inject->tier_1 = $price['tier_1'];
    		$inject->tier_2 = $price['tier_2'];
    		$inject->tier_3 = $price['tier_3'];
    		$inject->tier_4 = $price['tier_4'];
    		$inject->tier_5 = $price['tier_5'];
    		$inject->tier_6 = $price['tier_6'];
    		$inject->tier_7 = $price['tier_7'];
    		$inject->save();
    	}

    	return 200;
    }
    
}
