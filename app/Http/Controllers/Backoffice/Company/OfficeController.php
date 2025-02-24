<?php

namespace App\Http\Controllers\Backoffice\Company;

use App\Http\Controllers\Controller;
use App\Office;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OfficeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'country_location' => 'required',
            'city_location' => 'min:3',
            'address' => 'min:5|nullable',
            'phone' => 'nullable',
            'email' =>'nullable',
            'company_id' => 'required'
        ]);

        Office::create([
            'country_location' => $request->country_location,
            'city_location' => $request->city_location,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'company_id' => $request->company_id
        ] );

        return back()->with('success', 'Branch/Office Addition: Success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Office $office
     * @return Response
     */
    public function update(Request $request, Office $office)
    {
        $office = Office::find($request->id);

        $this->validate($request, [
            'country_location' => 'required',
            'city_location' => 'min:3',
            'address' => 'min:5|nullable',
            'phone' => 'nullable',
            'email' =>'nullable',
            'company_id' => 'required'
        ]);

        $office->update( array_merge( $request->only([
            'country_location', 'city_location', 'address', 'phone', 'email', 'company_id'
        ])));

        return back()->with('success', 'Branch/Office Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Office $office
     * @return Response
     */
    public function destroy(Request $request,Office $office)
    {
        $office = Office::find($request->id);
        $office->delete();

        return back()->with('success', 'Company Branch Deletion: Success');
    }
}
