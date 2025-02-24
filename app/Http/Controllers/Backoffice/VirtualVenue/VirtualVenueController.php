<?php

namespace App\Http\Controllers\Backoffice\VirtualVenue;

use App\Http\Controllers\Controller;
use App\VirtualVenue;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\VirtualVenue\StoreRequest;
use DB;

class VirtualVenueController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venue = VirtualVenue::first();

        return view('backoffice/virtual_venue/create', compact('venue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\VirtualVenue\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if ( VirtualVenue::exists() )
        
            DB::table('virtual_venues')->update( $request->only([

                'email', 'phone', 'tax',
            ]));

        else

            VirtualVenue::create( $request->all() );

        return back()->with('success', 'Virtual location has been saved');
    }
}
