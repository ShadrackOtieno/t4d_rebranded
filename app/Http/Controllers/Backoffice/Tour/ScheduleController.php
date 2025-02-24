<?php

namespace App\Http\Controllers\Backoffice\Tour;

use App\Http\Controllers\Controller;
use App\TourSchedule;
use App\Tour;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Tour\Schedule\StoreRequest;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Tour $tour)
    {
        $schedules = $tour->schedules()->latest()->paginate(10);

        return view('backoffice/tour/schedule/index', compact('tour', 'schedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Tour\Schedule\StoreRequest  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Tour $tour)
    {
        $tour->schedules()->create( $request->all() );

        return back()->with('success', 'Tour schedule has been saved');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tour  $tour
     * @param  \App\TourSchedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour, TourSchedule $schedule)
    {
        return view('backoffice/tour/schedule/edit', compact('tour', 'schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Tour\Schedule\StoreRequest  $request
     * @param  \App\Tour  $tour
     * @param  \App\TourSchedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Tour $tour, TourSchedule $schedule)
    {
        $tour->schedules()->where('id', $schedule->id)->update( $request->only([

            'from', 'to', 'booking_end',
        ]) );

        return back()->with('success', 'Tour schedule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tour  $tour
     * @param  \App\TourSchedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour, TourSchedule $schedule)
    {
        $schedule->delete();

        return back()->with('success', 'Tour schedule has been deleted');
    }
}
