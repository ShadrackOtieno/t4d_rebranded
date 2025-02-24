<?php

namespace App\Http\Controllers\Backoffice\Certification\Bundle;

use App\CertificationBundleBooking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Certification\Bundle\Export\BookingExcelExport;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
        $bookings = CertificationBundleBooking::when($request->search, function ($query, $search) {
            $query->where('id', 'like', "$search%")->orWhere('name', 'like', "%$search%")
            ->orWhere('personal_email', 'like', "%$search%")
            ->orWhereHas('certification', function ($query) use ($search) {
                $query->where('certifications.name', 'like', "%$search%");
            });

        })->withCount('participants')->latest()->paginate(100);

        return view('backoffice/certification/bundle/booking/index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  CertificationBundleBooking  $booking
     * @return View
     */
    public function show(CertificationBundleBooking $booking)
    {
        return view('backoffice/certification/bundle/booking/show', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  CertificationBundleBooking  $booking
     * @return RedirectResponse
     */
    public function update(Request $request, CertificationBundleBooking $booking)
    {
        $booking->payment()->update( $request->only('date_approved') );

        return back()->with('success', 'Booking has been updated');
    }

    /**
     * Export to excel.
     * 
     * @return Response
     */
    public function export()
    {
        return (new BookingExcelExport)->download("certification bundle bookings.xlsx");
    }
}
