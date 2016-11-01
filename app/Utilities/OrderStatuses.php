<?php

namespace App\Utilities;

class OrderStatuses
{
	/**
	 * Description
	 *
	 * @return void
	 */
	public static function statuses()
	{
		return[
			'New',
			'Artwork',
			'Production',
			'Complete',
			'Shipped',
			'Delivered',
		];
	}

}