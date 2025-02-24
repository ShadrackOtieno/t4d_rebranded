<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PhysicalClass;
use App\Course;
use App\Venue;

class PhysicalClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ( $request->query('sort') ) {

            case 'title':
                $result = $this->byTitle();
                break;

            case 'location':
                $result = $this->byVenue();
                break;
            
            default:
                $result = $this->byMonth();
                break;
        }

        return $result;
    }

    /**
     * Display a listing of the resource by month.
     *
     * @return \Illuminate\Http\Response
     */
    private function byMonth()
    {
        $schedules = PhysicalClass::whereDate(
            
            'from', '>=', now()
            
        )->whereYear(

            'from', date('Y')

        )->with(['course', 'currencies'])->orderBy('from', 'ASC')->get();

        return view('front/course/physical/monthly', compact('schedules'));
    }

    /**
     * Display a listing of the resource by location.
     *
     * @return \Illuminate\Http\Response
     */
    private function byVenue()
    {
        $venues = Venue::whereHas('cities.physicalClasses', function ($query) {

            $query->whereDate(
            
                'from', '>=', now()
                
            )->whereYear(
    
                'from', date('Y')
            );

        })->with('cities.physicalClasses')->get();

        return view('front/course/physical/venue', compact('venues'));
    }

    /**
     * Display a listing of the resource by title.
     *
     * @return \Illuminate\Http\Response
     */
    private function byTitle()
    {
        $courses = Course::whereHas('physicalClasses', function ($query) {

            $query->whereDate(
            
                'from', '>=', now()
                
            )->whereYear(
    
                'from', date('Y')
            );

        })->get();

        return view('front/course/physical/title', compact('courses'));
    }
}
