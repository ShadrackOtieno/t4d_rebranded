<?php

namespace App\Http\Controllers\Backoffice\Certification\Bundle;

use App\Http\Controllers\Controller;
use App\PhysicalCertificationBundle;
use App\CertificationBundle;
use App\City;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Certification\Physical\StoreRequest;

class PhysicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CertificationBundle $bundle)
    {
        $classes = $bundle->physicalClasses()->join(

            'cities', 'physical_certification_bundles.city_id', '=', 'cities.id'

        )->join(

            'venues', 'cities.venue_id', '=', 'venues.id'

        )->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'physical_certification_bundles.id', 'like', "$search%"
    
                )->orWhere(
    
                    'cities.name', 'like', "%$search%"

                )->orWhere(
    
                    'venues.country', 'like', "%$search%"
                );
            });

        })->selectRaw(

            "physical_certification_bundles.*, cities.name AS city, venues.country AS country"

        )->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/certification/bundle/physical/index', compact('bundle', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function create(CertificationBundle $bundle)
    {
        return view('backoffice/certification/bundle/physical/create', compact('bundle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\Physical\StoreRequest  $request
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, CertificationBundle $bundle)
    {
        $physical = $bundle->physicalClasses()->create( $request->all() );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $physical->currencies()->attach( array_combine( array_map(function ($key) use ($request) {

            return City::find($request->city_id)->venue->currencies()->whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhysicalCertificationBundle  $physical
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificationBundle $bundle, PhysicalCertificationBundle $physical)
    {
        return view('backoffice/certification/bundle/physical/edit', compact('physical', 'bundle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\Physical\StoreRequest  $request
     * @param  \App\PhysicalCertificationBundle  $physical
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, CertificationBundle $bundle, PhysicalCertificationBundle $physical)
    {
        $bundle->physicalClasses()->where('id', $physical->id)->update( $request->only([

            'from', 'to', 'city_id', 'tax', 'booking_start', 'booking_end',
        ]) );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $physical->currencies()->sync( array_combine( array_map(function ($key) use ($request) {

            return City::find($request->city_id)->venue->currencies()->whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CertificationBundle  $bundle
     * @param  \App\PhysicalCertificationBundle  $physical
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificationBundle $bundle, PhysicalCertificationBundle $physical)
    {
        $physical->delete();

        return back()->with('success', 'Schedule has been deleted');
    }
}
