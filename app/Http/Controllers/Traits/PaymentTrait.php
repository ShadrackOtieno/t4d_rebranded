<?php

namespace App\Http\Controllers\Traits;

use App\Payment;

trait PaymentTrait
{
	/**
	 * Create payment.
	 * 
	 * @param  object  $item
	 * @param  string  $method
	 * @return void
	 */
	public function createPayment($item, $method)
	{
		switch ( $class_name = get_class($item) ) {

			case 'App\CourseBooking':
				$amount = $item->total_cost;
				$currency = $item->currency;
				$item_type = $class_name;
				$item_id = $item->id;
				break;

			case 'App\HotelReservation':
				$amount = 0;
				$item_type = $class_name;
				$item_id = $item->id;
				$currency = 'USD';
				break;

			case 'App\TourBooking':
				$amount = @$item->tour->currencies->firstWhere('code', 'USD')->pivot->amount ?? 0;
				$currency = 'USD';
				$item_type = $class_name;
				$item_id = $item->id;
				break;

			case 'App\SoftwareQuotation':
				$amount = 0;
				$currency = 'USD';
				$item_type = $class_name;
				$item_id = $item->id;
				break;

			case 'App\CourseBundleBooking':
				$amount = $item->total_cost;
				$currency = $item->currency;
				$item_type = $class_name;
				$item_id = $item->id;
				break;
			
			default:
				# code...
				break;
		}

		Payment::create(

			compact('amount', 'item_id', 'item_type', 'method', 'currency') + [

				'status' => 'pending',
			]
		);
	}
}