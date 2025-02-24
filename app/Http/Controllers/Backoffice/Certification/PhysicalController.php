<?php

namespace App\Http\Controllers\Backoffice\Certification;

use App\Http\Controllers\Controller;
use App\PhysicalCertification;
use App\Certification;
use App\City;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Certification\Physical\StoreRequest;

class PhysicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Certification $certification)
    {
        $classes = $certification->physicalClasses()->join(

            'cities', 'physical_certifications.city_id', '=', 'cities.id'

        )->join(

            'venues', 'cities.venue_id', '=', 'venues.id'

        )->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'physical_certifications.id', 'like', "$search%"
    
                )->orWhere(
    
                    'cities.name', 'like', "%$search%"

                )->orWhere(
    
                    'venues.country', 'like', "%$search%"
                );
            });

        })->selectRaw(

            "physical_certifications.*, cities.name AS city, venues.country AS country"

        )->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/certification/physical/index', compact('certification', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function create(Certification $certification)
    {
        return view('backoffice/certification/physical/create', compact('certification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\Physical\StoreRequest  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Certification $certification)
    {
        $physical = $certification->physicalClasses()->create( $request->all() );

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
     * @param  \App\Certification  $certification
     * @param  \App\PhysicalCertification  $physical
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification, PhysicalCertification $physical)
    {
        return view('backoffice/certification/physical/edit', compact('certification', 'physical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\Physical\StoreRequest  $request
     * @param  \App\Certification  $certification
     * @param  \App\PhysicalCertification  $physical
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Certification $certification, PhysicalCertification $physical)
    {
        $certification->physicalClasses()->where('id', $physical->id)->update( $request->only([

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
     * @param  \App\Certification  $certification
     * @param  \App\PhysicalCertification  $physical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certification $certification, PhysicalCertification $physical)
    {
        $physical->delete();

        return back()->with('success', 'Schedule has been deleted');
    }
}
