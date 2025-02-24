<?php

namespace App\Http\Controllers\Backoffice\Tour;

use App\Http\Controllers\Controller;
use App\TourBooking;
use App\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Tour\Export\BookingExcelExport;

class TourBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function index(Tour $tour, Request $request)
    {
        $bookings = $tour->bookings()->when($request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"
    
                )->orWhere(
    
                    'name', 'like', "%$search%"
    
                )->orWhere(
    
                    'email', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10);

        return view('backoffice/tour/booking/index', compact('tour', 'bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tour  $tour
     * @param  \App\TourBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour, TourBooking $booking)
    {
        return view('backoffice/tour/booking/show', compact('tour', 'booking'));
    }

    /**
     * Export to excel.
     *
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function export(Tour $tour)
    {
        return ( new BookingExcelExport($tour) )->download("$tour->name tour bookings.xlsx");
    }
}
