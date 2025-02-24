<?php

namespace App\Http\Controllers\Backoffice\Currency;

use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Currency\Export\CurrencyExcelExport;
use App\Http\Requests\Backoffice\Currency\StoreRequest;
use App\Http\Requests\Backoffice\Currency\UpdateRequest;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currencies = Currency::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'code', 'like', "%$search%"

            )->orWhere(

                'description', 'like', "%$search%"  
            );

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/currency/index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice/currency/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Currency\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Currency::create( $request->all() );

        return back()->with('success', 'Currency has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('backoffice/currency/edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Currency\UpdateRequest  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Currency $currency)
    {
        $currency->update( $request->all() );

        return back()->with('success', 'Currency has been changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return back()->with('success', 'Currency has been deleted');
    }

    /**
     * Export to excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new CurrencyExcelExport )->download('currencies.xlsx');
    }
}
