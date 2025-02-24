<?php

namespace App\Http\Controllers\Backoffice\Course\Bundle;

use App\Http\Controllers\Controller;
use App\VirtualBundle;
use App\CourseBundle;
use App\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Course\Bundle\VirtualBundle\StoreRequest;

class VirtualBundleController extends Controller
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
        $schedules = $bundle->virtualBundles()->when( $request->search, function ($query, $search) {

            $query->where('virtual_bundles.id', 'like', "$search%");

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/bundle/virtual/index', compact('bundle', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function create(CourseBundle $bundle)
    {
        return view('backoffice/course/bundle/virtual/create', compact('bundle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\Bundle\VirtualBundle\StoreRequest  $request
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, CourseBundle $bundle)
    {
        $virtual_bundle = $bundle->virtualBundles()->create( $request->all() );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $virtual_bundle->currencies()->attach( array_combine( array_map(function ($key) {

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
     * @param  \App\VirtualBundle  $virtual_bundle
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseBundle $bundle, VirtualBundle $virtual_bundle)
    {
        return view('backoffice/course/bundle/virtual/edit', compact('bundle', 'virtual_bundle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\Bundle\VirtualBundle\StoreRequest  $request
     * @param  \App\CourseBundle  $bundle
     * @param  \App\VirtualBundle  $virtual_bundle
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, CourseBundle $bundle, VirtualBundle $virtual_bundle)
    {
        $bundle->virtualBundles()->where('id', $virtual_bundle->id)->update( $request->only([

            'from', 'to', 'tax', 'booking_start', 'booking_end',
        ]) );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $virtual_bundle->currencies()->sync( array_combine( array_map(function ($key) {

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
     * @param  \App\VirtualBundle  $virtual_bundle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseBundle $bundle, VirtualBundle $virtual_bundle)
    {
        $virtual_bundle->delete();

        return back()->with('success', 'Schedule has been deleted');
    }
}
