<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Export\CourseScheduleCalendarExport;
use App\Download;
use App\CourseCalendar;
use App\PhysicalClass;
use App\VirtualClass;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use SEO;

class TrainingCalendarController extends Controller
{
    /**
     * Save download details.
     *
     * @param Request $request
     * @param CourseCalendar $calendar
     * @return Application|Factory|View
     */
    public function form(Request $request, CourseCalendar $calendar)
    {
        return view('front/training_calendar/download', compact('calendar'));
    }

    /**
     * Save download details.
     *
     * @param Request $request
     * @param CourseCalendar $calendar
     * @return Response
     */
    public function download(Request $request, CourseCalendar $calendar)
    {
        Download::create( array_merge( $request->all(), ['document' => "$calendar->year +1 Training Calendar"] ) );

        return Storage::download($calendar->document, "$calendar->year Training Calendar");
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        SEO::setTitle( 'Training Calendar ');
        SEO::setDescription( 'Explore and book your preferred training courses at Indepth Research Institute. Choose your dates and enhance your skills with our global corporate training programs. Join today for unmatched professional growth and development!');

        SEO::opengraph()->setTitle( 'Training Calendar - ' . config('app.name') );
        SEO::opengraph()->setDescription( 'Explore and book your preferred training courses at Indepth Research Institute. Choose your dates and enhance your skills with our global corporate training programs. Join today for unmatched professional growth and development!');
        SEO::opengraph()->setUrl( url()->current() );
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        SEO::twitter()->setTitle( 'Training Calendar - ' . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');
        SEO::twitter()->setDescription('Explore and book your preferred training courses at Indepth Research Institute. Choose your dates and enhance your skills with our global corporate training programs. Join today for unmatched professional growth and development!');
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        SEO::jsonLd()->setTitle( 'Training Calendar - ' . config('app.name') );
        SEO::setDescription('Explore and book your preferred training courses at Indepth Research Institute. Choose your dates and enhance your skills with our global corporate training programs. Join today for unmatched professional growth and development!');
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        $perPage = 500; // Records to per page
        $durationFilter = $request->filled('duration') ? $request->duration : null;

        $physical_schedules = collect([]);
        $virtual_schedules = collect([]);
        $category = null;

        if (!$request->has('period')) {
            $physical_schedules = PhysicalClass::whereDate('from', '>', now())
            ->distinct('course_id');
        }

        if ($request->has('category')) {
            $category = $request->category;
            $physical_schedules->whereHas('course', function ($query) use ($category) {
                $query->where('subcategory_id', $category);
            });
        }

        // if (!$request->has('physical')) {
        //     $virtual_schedules = VirtualClass::whereDate('from', '>', now())
        //     ->when($request->year, function ($query, $year) {
        //         $query->whereYear('from', $year);
        //     })
        //     ->when($request->period, function ($query, $period) {
        //         $query->wherePeriod($period);
        //     })
        //     ->when($durationFilter, function ($query, $duration) {
        //         $query->where('duration', $duration);
        //     })
        //     ->get();
        // }

        // Concatenate and sort the schedules
        // $schedules = $physical_schedules->concat($virtual_schedules);

        // // sort after concatenation (by 'from' date):
        // $schedules = $schedules->sortBy('from');
        $schedules = $physical_schedules->paginate(200);

        // maintain pagination for the concatenated results:
        // $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
        // $schedules = new \Illuminate\Pagination\LengthAwarePaginator($physical_schedules->forPage($currentPage, $perPage), $physical_schedules->count(), $perPage, $currentPage);


        return view('front/calendar', compact('schedules', 'category'));
    }

    /**
     * Export to excel.
     *
     * @param Request $request
     * @return Response
     */
    public function export(Request $request)
    {
        # set name of exported file
        if ( $request->has('year') )
            $filename = "$request->year $request->period Course Schedules Calendar";
        else if ( $request->has('duration') )
            $filename = "$request->duration Day Duration $request->period Course Schedules Calendar";
        else
            $filename = 'Course Schedules Calendar';

        # set schedule currency by country
        if ( request()->getHttpHost() == config('domains.rwanda') )
            $currency = 'RWF';
        else
            $currency = 'KES';

        # generate excel export
        return (
            new CourseScheduleCalendarExport( array_merge(
                $request->query(), compact('currency')
            ))
        )->download("$filename.xlsx");
    }
}