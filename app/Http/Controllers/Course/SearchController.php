<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PhysicalClass;
use App\VirtualClass;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	if ( $request->filled('location') )
            # filter only face to face courses
            $schedules = $this->physicalClasses($request);

        else
            # filter both physical virtual and face to face courses
        	$schedules = $this->physicalClasses($request)->concat(

                $this->virtualClasses($request)
            );

    	return view('front/course/search', compact('schedules'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function physicalClasses(Request $request)
    {
        $physicalClasses = PhysicalClass::when($request->subcategory, function ($query, $subcategory) {

            $query->whereHas('course.subcategory', function ($query) use ($subcategory) {

                $query->where('subcategories.id', $subcategory);
            });

        })->when($request->location, function ($query, $location) {

            $query->whereHas('city', function ($query) use ($location) {

                $query->where('cities.name', $location);
            });

        })->when($request->month, function ($query, $month) {

            $query->whereMonth('from', $month);

        })->when($request->name, function ($query, $name) {

            $query->whereHas('course', function ($query) use ($name) {

                $query->where('name', 'like', "%$name%");
            });

        })->latest()->get();

        return $physicalClasses;
    }

     /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function virtualClasses(Request $request)
    {
        $virtualClasses = VirtualClass::when($request->subcategory, function ($query, $subcategory) {

            $query->whereHas('course.subcategory.category', function ($query) use ($subcategory) {

                $query->where('subcategories.id', $subcategory);
            });

        })->when($request->month, function ($query, $month) {

            $query->whereMonth('from', $month);

        })->when($request->name, function ($query, $name) {

            $query->whereHas('course', function ($query) use ($name) {

                $query->where('name', 'like', "%$name%");
            });

        })->latest()->get();

        return $virtualClasses;
    }
}
