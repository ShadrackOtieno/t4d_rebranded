<?php

namespace App\Http\Controllers\Backoffice\Course;

use App\CourseBooking;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Course\Export\BookingExcelExport;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $bookings = CourseBooking::when($request->search, function ($query, $search) {$query
            ->where('id', 'like', "$search%")
            ->orWhere('name', 'like', "%$search%")
            ->orWhere('personal_email', 'like', "%$search%");
        })->latest()->paginate(100);

        return view('backoffice/course/booking/index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param CourseBooking $booking
     * @return Application|Factory|View
     */
    public function show(CourseBooking $booking)
    {
        return view('backoffice/course/booking/show', compact('booking'));
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param CourseBooking $booking
     * @return RedirectResponse
     */
    public function update(CourseBooking $booking, Request $request): RedirectResponse
    {
        $booking->update(['attendance'=>$request->attendance]);

        return back()->with('success', 'Attendance Update: Success');
    }

    /**
     * Export to excel.
     *
     * @return Response
     */
    public function export(): Response
    {
        return (new BookingExcelExport)->download("course bookings.xlsx");
    }
}
