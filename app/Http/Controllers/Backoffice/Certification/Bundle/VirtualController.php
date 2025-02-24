<?php

namespace App\Http\Controllers\Backoffice\Certification\Bundle;

use App\Http\Controllers\Controller;
use App\VirtualCertificationBundle;
use App\Currency;
use App\CertificationBundle;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Certification\Virtual\StoreRequest;

class VirtualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CertificationBundle  $certification
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CertificationBundle $bundle)
    {
        $classes = $bundle->virtualClasses()->when( $request->search, function ($query, $search) {

            $query->where('id', 'like', "$search%");

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/certification/bundle/virtual/index', compact('bundle', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function create(CertificationBundle $bundle)
    {
        return view('backoffice/certification/bundle/virtual/create', compact('bundle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\Virtual\StoreRequest  $request
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, CertificationBundle $bundle)
    {
        $virtual = $bundle->virtualClasses()->create( $request->all() );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $virtual->currencies()->attach( array_combine( array_map(function ($key) {

            return Currency::whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CertificationBundle  $bundle
     * @param  \App\VirtualCertificationBundle  $virtual
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificationBundle $bundle, VirtualCertificationBundle $virtual)
    {
        return view('backoffice/certification/bundle/virtual/edit', compact('bundle', 'virtual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\Virtual\StoreRequest  $request
     * @param  \App\CertificationBundle  $bundle
     * @param  \App\VirtualCertificationBundle  $virtual
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, CertificationBundle $bundle, VirtualCertificationBundle $virtual)
    {
        $bundle->virtualClasses()->where('id', $virtual->id)->update( $request->only([

            'from', 'to', 'city_id', 'tax', 'booking_start', 'booking_end',
        ]) );

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {

            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $virtual->currencies()->sync( array_combine( array_map(function ($key) {

            return Currency::whereCode( substr($key, 0, -16) )->first()->id;

        }, array_keys($currencies)), array_map( function ($value) {

            return ['amount' => $value];

        }, $currencies) ) );

        return back()->with('success', 'Schedule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certification  $certification
     * @param  \App\VirtualCertification  $virtual
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificationBundle $bundle, VirtualCertificationBundle $virtual)
    {
        $virtual->delete();

        return back()->with('success', 'Schedule has been deleted');
    }
}
