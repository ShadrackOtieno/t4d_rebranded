<?php

namespace App\Http\Controllers\Backoffice\Course;

use App\Http\Controllers\Controller;
use App\PhysicalClass;
use App\Course;
use App\City;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Course\PhysicalClass\StoreRequest;

class PhysicalClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course)
    {
        $classes = $course->physicalClasses()->join(

            'cities', 'physical_classes.city_id', '=', 'cities.id'

        )->join(

            'venues', 'cities.venue_id', '=', 'venues.id'

        )->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'physical_classes.id', 'like', "$search%"
    
                )->orWhere(
    
                    'cities.name', 'like', "%$search%"

                )->orWhere(
    
                    'venues.country', 'like', "%$search%"
                );
            });

        })->selectRaw(

            "physical_classes.*, cities.name AS city, venues.country AS country"

        )->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/physical/index', compact('course', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('backoffice/course/physical/create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\PhysicalClass\StoreRequest  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Course $course)
    {
        $physical_class = $course->physicalClasses()->create( $request->all() );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $physical_class->currencies()->attach( array_combine( array_map(function ($key) use ($request) {

            return City::find($request->city_id)->venue->currencies()->whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @param  \App\PhysicalClass  $physical_class
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, PhysicalClass $physical_class)
    {
        return view('backoffice/course/physical/edit', compact('course', 'physical_class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\PhysicalClass\StoreRequest  $request
     * @param  \App\Course  $course
     * @param  \App\PhysicalClass  $physical_class
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Course $course, PhysicalClass $physical_class)
    {
        $course->physicalClasses()->where('id', $physical_class->id)->update( $request->only([

            'from', 'to', 'city_id', 'tax', 'booking_start', 'booking_end',
        ]) );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $physical_class->currencies()->sync( array_combine( array_map(function ($key) use ($request) {

            return City::find($request->city_id)->venue->currencies()->whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @param  \App\PhysicalClass  $physical_class
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, PhysicalClass $physical_class)
    {
        $physical_class->delete();

        return back()->with('success', 'Schedule has been deleted');
    }
}
