<?php

namespace App\Http\Controllers\Backoffice\Venue;

use App\Currency;
use App\Venue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Venue\Currency\StoreRequest;
use App\Http\Controllers\Backoffice\Venue\Export\CurrencyExcelExport;
use Session;
use DB;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Venue $venue)
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

        return view('backoffice.venue.currency.index', compact('venue', 'currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function create(Venue $venue)
    {
        return view('backoffice.venue.currency.create', compact('venue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Venue\Currency\StoreRequest  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Venue $venue)
    {
        $venue->currencies()->create( array_merge( $request->only([

            'code', 'description', 'bank_name', 'bank_branch', 'bank_account', 'account_name', 'bank_code', 'branch_code', 'swift_code',
        ]), [

            'tax' => $request->has('tax')

        ]) );

        return back()->with('success', 'Currency has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venue  $venue
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue, Currency $currency)
    {
        return view('backoffice.venue.currency.edit', compact('venue', 'currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Venue\Currency\StoreRequest  $request
     * @param  \App\Venue  $venue
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Venue $venue, Currency $currency)
    {
        if (

            DB::table('currencies')
                ->whereId($currency->id)
                ->update( array_merge( $request->only([

                    'code', 'description', 'bank_name', 'bank_branch', 'bank_account', 'account_name', 'bank_code', 'branch_code', 'swift_code',
                ]), [

                    'tax' => $request->has('tax')

                ]))
        ) 
            Session::flash('success', 'Currency has been updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue, Currency $currency)
    {
        $currency->delete();

        return back()->with('success', 'Currency has been deleted');
    }

    /**
     * Export to excel.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function export(Venue $venue)
    {
        return ( new CurrencyExcelExport($venue) )->download("$venue->country currencies.xlsx");
    }
}
