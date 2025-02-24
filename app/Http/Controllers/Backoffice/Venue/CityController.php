<?php

namespace App\Http\Controllers\Backoffice\Venue;

use App\City;
use App\Venue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Venue\City\StoreRequest;
use App\Http\Requests\Backoffice\Venue\City\UpdateRequest;
use App\Http\Controllers\Backoffice\Venue\Export\CityExcelExport;

class CityController extends Controller
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
        $cities = $venue->cities()->when($request->search, function ($query, $search) {

            $query->where(function ($query) use ($search) {

                $query->where(

                    'id',
                    'like',
                    "$search%"

                )->orWhere(

                        'name',
                        'like',
                        "%$search%"
                    );
            });

        })->latest()->paginate(10)->appends($request->query());

        return view('backoffice/venue/city/index', compact('cities', 'venue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function create(Venue $venue)
    {
        return view('backoffice/venue/city/create', compact('venue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Venue\City\StoreRequest  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */

    public function store(StoreRequest $request, Venue $venue)
    {
        $requestData = $request->all();

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = time() . '.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('images'), $coverName);

            $coverUrl = url('images/' . $coverName);
            $requestData['cover'] = $coverUrl;
        }
        $requestData['description'] = $request->input('description');

        $venue->cities()->create($requestData);

        return back()->with('success', 'City has been added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venue  $venue
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue, City $city)
    {
        return view('backoffice/venue/city/edit', compact('venue', 'city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Venue\City\UpdateRequest  $request
     * @param  \App\Venue  $venue
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateRequest $request, Venue $venue, City $city)
    // {
    //     $venue->cities()->where(

    //         'id',
    //         $city->id

    //     )->update($request->only('name'));

    //     return back()->with('success', 'City has been updated');
    // }
    public function update(UpdateRequest $request, Venue $venue, City $city)
    {
        $requestData = $request->all();
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = time() . '.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('venues'), $coverName);
            $coverUrl = url('venues/' . $coverName);
            $requestData['cover'] = $coverUrl;
        }
        $city->update($requestData);
        return back()->with('success', 'City has been updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue, City $city)
    {
        $city->delete();

        return back()->with('success', 'City has been deleted');
    }

    /**
     * Export to excel.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function export(Venue $venue)
    {
        return (new CityExcelExport($venue))->download("$venue->country cities.xlsx");
    }
}
