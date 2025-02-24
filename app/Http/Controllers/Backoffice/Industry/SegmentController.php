<?php

namespace App\Http\Controllers\Backoffice\Industry;
use App\Http\Controllers\Controller;

use App\Segment;
use Illuminate\Http\Request;
use Str;

class SegmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $segments = Segment::paginate(50);

        return view('backoffice/industry/segment/index', compact('segments'));
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
            'name' => 'bail|required|unique:segments|min:3',
            'description' => 'nullable|min:3',
        ]);

        $slug = Str::slug($request->name, '-');

        Segment::create( array_merge( $request->only(['name', 'description']),
        ['slug' => $slug ]) );

        return back()->with('success', 'Segment Creation: Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function show(Segment $segment)
    {
        return view('backoffice/industry/segment/sector/index', compact('segment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function edit(Segment $segment)
    {
        return view('backoffice/industry/segment/edit', compact('segment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Segment $segment)
    {
        $request->validate([
            'name' => 'bail|required|min:3',
            'description' => 'nullable|min:3',
        ]);

        $slug = Str::slug($request->name, '-');

        $segment->update( array_merge( $request->only(['name', 'description']),
        ['slug' => $slug ]) );

        return redirect()->route('backoffice.segments.index')->with('success', 'Segment Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Segment $segment)
    {
        $segment->delete();

        return back()->with('success', 'Segment Deletion: Success');
    }

    /**
     * Return segment companies.
     *
     * @param  \App\Segment  $segment
     * @return \Illuminate\View\view
     */
    public function companies(Segment $segment){
        return view('backoffice/industry/segment/companies', compact('segment'));
    }
}
