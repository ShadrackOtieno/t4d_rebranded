<?php

use Illuminate\Support\Facades\Log;

if ( !function_exists('geo') ) {

	function geo()
	{
		$location = @json_decode(

			file_get_contents(
				"http://www.geoplugin.net/json.gp?ip=" . request()->ip()
			)
		);

		try {

			return (object) [

				'country_name' => $location->geoplugin_countryName,
			];
			
		} 
		catch (Exception $e) {

			Log::info($e);
			Log::info($location);

			return (object) [

				'country_name' => '',
			];
		}
	}
}