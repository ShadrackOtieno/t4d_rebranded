<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\VirtualClass;
use App\Course;

class VirtualClassController extends Controller
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
        $schedules = VirtualClass::whereDate(
            
            'from', '>=', now()
            
        )->whereYear(

            'from', date('Y')

        )->with(['course', 'currencies'])->orderBy('from', 'ASC')->get();

        return view('front/course/virtual/monthly', compact('schedules'));
    }

    /**
     * Display a listing of the resource by title.
     *
     * @return \Illuminate\Http\Response
     */
    private function byTitle()
    {
        $courses = Course::whereHas('virtualClasses', function ($query) {

            $query->whereDate(
            
                'from', '>=', now()
                
            )->whereYear(
    
                'from', date('Y')
            );

        })->get();

        return view('front/course/virtual/title', compact('courses'));
    }
}
