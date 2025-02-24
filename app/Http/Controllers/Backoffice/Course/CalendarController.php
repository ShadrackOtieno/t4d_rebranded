<?php

namespace App\Http\Controllers\Backoffice\Course;

use App\CourseCalendar;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Course\Calendar\StoreRequest;
use App\Http\Requests\Course\Calendar\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $calendars = CourseCalendar::when( $request->search, function ($query, $search) {
            $query->where('id', 'like', "$search%")->orWhere('year', 'like', "%$search%");
        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/calendar/index', compact('calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice/course/calendar/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $document = $request->file('document')->store('course/calendar');

        CourseCalendar::create( array_merge( $request->only('year'), compact('document') ) );

        return back()->with('success', 'Calendar has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CourseCalendar $calendar
     * @return Application|Factory|View
     */
    public function edit(CourseCalendar $calendar)
    {
        return view('backoffice/course/calendar/edit', compact('calendar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param CourseCalendar $calendar
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, CourseCalendar $calendar): RedirectResponse
    {
        if ( $request->hasFile('document') ) {
            $document = $request->file('document')->store('course/calendar');
            Storage::delete($calendar->document);
        }
        else
            $document = $calendar->document;

        $calendar->update( array_merge( $request->only('year'), compact('document') ) );

        return back()->with('success', 'Calendar has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CourseCalendar $calendar
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(CourseCalendar $calendar): RedirectResponse
    {
        $calendar->delete();

        return back()->with('success', 'Calendar has been deleted');
    }
}
