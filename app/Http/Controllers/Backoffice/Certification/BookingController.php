<?php

namespace App\Http\Controllers\Backoffice\Certification;

use App\CertificationBooking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Certification\Export\BookingExcelExport;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request)
    {
        $bookings = CertificationBooking::when($request->search, function ($query, $search) {
            $query->where('id', 'like', "$search%")->orWhere('name', 'like', "%$search%")->orWhere(
                'personal_email', 'like', "%$search%"
            )->orWhereHas('certification', function ($query) use ($search) {
                $query->where('certifications.name', 'like', "%$search%");
            });

        })->withCount('participants')->latest()->paginate(100);

        return view('backoffice/certification/booking/index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  CertificationBooking  $booking
     * @return View
     */
    public function show(CertificationBooking $booking)
    {
        return view('backoffice/certification/booking/show', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  CertificationBooking  $booking
     * @return RedirectResponse
     */
    public function update(Request $request, CertificationBooking $booking)
    {
        $booking->payment()->update( $request->only('date_approved') );

        return back()->with('success', 'Booking has been updated');
    }

    /**
     * Export to excel.
     * 
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return (new BookingExcelExport)->download("certification bookings.xlsx");
    }
}
