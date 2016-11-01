<?php

namespace App\Utilities;
use App\Profiles\UserRole;

trait Utility 
{

	/**
	 * Description
	 *
	 * @return void
	 */
	public static function findGod()
	{	
		if(\Auth::check()){
				
			$check = \Auth::user()->roles()->each(function($role){
				if($role->role_value === UserRole::GOD){
					return true;
				}else{
					return false;
				}
			});

			if($check === true){
				return true;
			}

			return false;
		}
	}
	
}