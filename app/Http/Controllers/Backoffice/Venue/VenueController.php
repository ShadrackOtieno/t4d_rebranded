<?php

namespace App\Http\Controllers\Backoffice\Venue;

use App\Http\Controllers\Controller;
use App\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Venue\Export\VenueExcelExport;
use App\Http\Requests\Backoffice\Venue\StoreRequest;
use App\Http\Requests\Backoffice\Venue\UpdateRequest;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $venues = Venue::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'email', 'like', "%$search%"

            )->orWhere(

                'country', 'like', "%$search%"
                
            )->orWhere(

                'phone', 'like', "%$search%"
            );

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/venue/index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice/venue/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Venue\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)

    {
        Venue::create( array_merge( $request->except('head_office'), [

            'head_office' => $request->filled('head_office')
        ]) );

        return back()->with('success', 'Venue has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        return view('backoffice/venue/edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Venue\UpdateRequest  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Venue $venue)
    {
        $venue->update( array_merge( $request->except('head_office'), [

            'head_office' => $request->filled('head_office')
        ]) );

        return back()->with('success', 'Venue has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return back()->with('success', 'Venue has been deleted');
    }

    /**
     * Export to excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new VenueExcelExport )->download('venues.xlsx');
    }
}
