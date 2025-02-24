<?php

namespace App\Http\Controllers\Backoffice\Industry;
use App\Http\Controllers\Controller;


use App\Sector;
use Illuminate\Http\Request;
use Str;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|min:3',
            'description' => 'nullable|min:3',
            'segment_id' => 'required'
        ]);

        $slug = Str::slug($request->name, '-');

        Sector::create( array_merge( $request->only(['name', 'description', 'segment_id']),
        ['slug' => $slug ]) );

        return back()->with('success', 'Sector Creation: Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\View\View
     */
    public function show(Sector $sector)
    {
        return view('backoffice/industry/segment/sector/subsector/index', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\View\View
     */
    public function edit(Sector $sector)
    {
        return view('backoffice/industry/segment/sector/edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Sector $sector)
    {
        $request->validate([
            'name' => 'bail|required|min:3',
            'description' => 'nullable|min:3',
            'segment_id' => 'required'
        ]);

        $slug = Str::slug($request->name, '-');

        $sector->update( array_merge( $request->only(['name', 'description', 'segment_id']),
        ['slug' => $slug ]) );

        return redirect()->route('backoffice.segments.show', $request->segment_id)->with('success', 'Sector Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();

        return back()->with('success', 'Sector Deletion: Success');
    }

    /**
     * Return segment companies.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\View\view
     */
    public function companies(Sector $sector){
        return view('backoffice/industry/segment/sector/companies', compact('sector'));
    }
}
