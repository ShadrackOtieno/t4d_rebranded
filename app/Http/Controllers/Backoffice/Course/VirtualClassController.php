<?php

namespace App\Http\Controllers\Backoffice\Course;

use App\Http\Controllers\Controller;
use App\VirtualClass;
use App\Course;
use App\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Course\VirtualClass\StoreRequest;

class VirtualClassController extends Controller
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
        $classes = $course->virtualClasses()->when( $request->search, function ($query, $search) {

            $query->where('virtual_classes.id', 'like', "$search%");

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/virtual/index', compact('course', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('backoffice/course/virtual/create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\VirtualClass\StoreRequest  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Course $course)
    {
        $virtual_class = $course->virtualClasses()->create( $request->all() );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $virtual_class->currencies()->attach( array_combine( array_map(function ($key) {

            return Currency::whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @param  \App\VirtualClass  $virtual_class
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, VirtualClass $virtual_class)
    {
        return view('backoffice/course/virtual/edit', compact('course', 'virtual_class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\VirtualClass\StoreRequest  $request
     * @param  \App\Course  $course
     * @param  \App\VirtualClass  $virtual_class
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Course $course, VirtualClass $virtual_class)
    {
        $course->virtualClasses()->where('id', $virtual_class->id)->update( $request->only([

            'from', 'to', 'city_id', 'tax', 'booking_start', 'booking_end', 'period',
        ]) );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $virtual_class->currencies()->sync( array_combine( array_map(function ($key) {

            return Currency::whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @param  \App\VirtualClass  $virtual_class
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, VirtualClass $virtual_class)
    {
        $virtual_class->delete();

        return back()->with('success', 'Schedule has been deleted');
    }
}
