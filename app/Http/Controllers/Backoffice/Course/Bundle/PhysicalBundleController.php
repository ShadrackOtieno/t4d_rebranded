<?php

namespace App\Http\Controllers\Backoffice\Course\Bundle;

use App\Http\Controllers\Controller;
use App\PhysicalBundle;
use App\CourseBundle;
use App\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Course\Bundle\PhysicalBundle\StoreRequest;

class PhysicalBundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CourseBundle $bundle)
    {
        $schedules = $bundle->physicalBundles()->join(

            'cities', 'physical_bundles.city_id', '=', 'cities.id'

        )->join(

            'venues', 'cities.venue_id', '=', 'venues.id'

        )->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'physical_bundles.id', 'like', "$search%"
    
                )->orWhere(
    
                    'cities.name', 'like', "%$search%"

                )->orWhere(
    
                    'venues.country', 'like', "%$search%"
                );
            });

        })->selectRaw(

            "physical_bundles.*, cities.name AS city, venues.country AS country"

        )->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/bundle/physical/index', compact('bundle', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function create(CourseBundle $bundle)
    {
        return view('backoffice/course/bundle/physical/create', compact('bundle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\Bundle\PhysicalBundle\StoreRequest  $request
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, CourseBundle $bundle)
    {
        $physical_bundle = $bundle->physicalBundles()->create( $request->all() );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $physical_bundle->currencies()->attach( array_combine( array_map(function ($key) {

            return Currency::whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseBundle  $bundle
     * @param  \App\PhysicalBundle  $physicalBundle
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseBundle $bundle, PhysicalBundle $physical_bundle)
    {
        return view('backoffice/course/bundle/physical/edit', compact('bundle', 'physical_bundle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\Bundle\PhysicalBundle\StoreRequest  $request
     * @param  \App\CourseBundle  $bundle
     * @param  \App\PhysicalBundle  $physical_bundle
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, CourseBundle $bundle, PhysicalBundle $physical_bundle)
    {
        $bundle->physicalBundles()->where('id', $physical_bundle->id)->update( $request->only([

            'from', 'to', 'city_id', 'tax', 'booking_start', 'booking_end',
        ]) );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $physical_bundle->currencies()->sync( array_combine( array_map(function ($key) {

            return Currency::whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseBundle  $bundle
     * @param  \App\PhysicalBundle  $physical_bundle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseBundle $bundle, PhysicalBundle $physical_bundle)
    {
        $physical_bundle->delete();

        return back()->with('success', 'Schedule has been deleted');
    }
}
