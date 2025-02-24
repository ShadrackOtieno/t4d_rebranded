<?php

namespace App\Http\Controllers\Backoffice\HotelReservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HotelReservation;
use App\Http\Controllers\Backoffice\HotelReservation\Export\HotelReservationExcelExport;

class HotelReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservations = HotelReservation::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'name', 'like', "%$search%"
            );

        })->latest()->paginate(10);

        return view('backoffice/hotel_reservation/index', compact('reservations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelReservation  $hotel_reservation
     * @return \Illuminate\Http\Response
     */
    public function show(HotelReservation $hotel_reservation)
    {
        return view('backoffice/hotel_reservation/show', compact('hotel_reservation'));
    }

    /**
     * Export to excel.
     * 
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return (new HotelReservationExcelExport)->download("hotel reservations.xlsx");
    }
}
