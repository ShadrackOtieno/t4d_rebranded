<?php

namespace App\Http\Controllers\Backoffice\Programs;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Program\ProgramBooking;
use Illuminate\View\View;

class ProgramBookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $bookings = ProgramBooking::paginate(100);

        return view('backoffice.programs.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  ProgramBooking $booking
     * @return Application|Factory|View
     */
    public function show(ProgramBooking $booking)
    {
        return view('backoffice.programs.bookings.show', compact('booking'));
    }
}
