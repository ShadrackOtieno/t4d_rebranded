<?php

namespace App\Http\Controllers\Backoffice\VirtualVenue;

use App\Currency;
use App\VirtualVenue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\VirtualVenue\Currency\StoreRequest;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VirtualVenue  $venue
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, VirtualVenue $venue)
    {
        $currencies = $venue->currencies()->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"

                )->orWhere(

                    'code', 'like', "%$search%"

                )->orWhere(

                    'description', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/virtual_venue/currency/index', compact('venue', 'currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\VirtualVenue  $venue
     * @return \Illuminate\Http\Response
     */
    public function create(VirtualVenue $venue)
    {
        return view('backoffice/virtual_venue/currency/create', compact('venue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\VirtualVenue\Currency\StoreRequest  $request
     * @param  \App\VirtualVenue  $venue
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, VirtualVenue $venue)
    {
        $venue->currencies()->create( array_merge( $request->only([

            'code', 'description', 'bank_name', 'bank_branch', 'bank_account',
        ]), [

            'tax' => $request->has('tax')
        ]) );

        return back()->with('success', 'Currency has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VirtualVenue  $venue
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(VirtualVenue $venue, Currency $currency)
    {
        return view('backoffice/virtual_venue/currency/edit', compact('venue', 'currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VirtualVenue  $venue
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VirtualVenue $venue, Currency $currency)
    {
        $venue->currencies()->where(

            'id', $currency->id

        )->update( array_merge( $request->only([

            'code', 'description', 'bank_name', 'bank_branch', 'bank_account',
        ]), [

            'tax' => $request->has('tax')
        ]) );

        return back()->with('success', 'Currency has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VirtualVenue  $venue
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(VirtualVenue $venue, Currency $currency)
    {
        $currency->delete();

        return back()->with('success', 'Currency has been deleted');
    }
}
