<?php

namespace App\Http\Controllers\Backoffice\Industry;
use App\Http\Controllers\Controller;

use App\SubSector;
use Illuminate\Http\Request;
use Str;

class SubSectorController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|min:3',
            'description' => 'nullable|min:3',
            'sector_id' => 'required'
        ]);

        $slug = Str::slug($request->name, '-');

        SubSector::create( array_merge( $request->only(['name', 'description', 'sector_id']),
        ['slug' => $slug ]) );

        return back()->with('success', 'Sub-Sector Creation: Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubSector  $subSector
     * @return \Illuminate\Http\Response
     */
    public function show(SubSector $subSector)
    {
        return view('backoffice/industry/index', compact('subSector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubSector  $subSector
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSector $subSector)
    {
        return view('backoffice/industry/segment/sector/subsector/edit', compact('subSector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubSector  $subSector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSector $subSector)
    {
        $request->validate([
            'name' => 'bail|required|min:3',
            'description' => 'nullable|min:3',
            'sector_id' => 'required'
        ]);

        $slug = Str::slug($request->name, '-');

        $subSector->update( array_merge( $request->only(['name', 'description', 'sector_id']),
        ['slug' => $slug ]) );

        return redirect()->route('backoffice.sectors.show', $request->sector_id)->with('success', 'Sub-Sector Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubSector  $subSector
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SubSector $subSector)
    {
        $subSector->delete();

        return back()->with('success', 'Sub-Sector Deletion: Success');
    } 

    /**
     * Return segment companies.
     *
     * @param  \App\Subsector  $subSector
     * @return \Illuminate\View\view
     */
    public function companies(SubSector $subSector){
        return view('backoffice/industry/segment/sector/subsector/companies', compact('subSector'));
    }
}
