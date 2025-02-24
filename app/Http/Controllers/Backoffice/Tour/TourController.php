<?php

namespace App\Http\Controllers\Backoffice\Tour;

use App\Http\Controllers\Controller;
use App\Tour;
use App\Currency;
use App\Venue;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Tour\Export\TourExcelExport;
use App\Http\Requests\Backoffice\Tour\StoreRequest;
use App\Http\Requests\Backoffice\Tour\UpdateRequest;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Storage;
use Str;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $tours = Tour::when($request->search, function ($query, $search) {
            $query->where(
                'id', 'like', "$search%"
            )->orWhere(
                'name', 'like', "%$search%"
            )->orWhere(
                'country', 'like', "%$search%"
            )->orWhere(
                'city', 'like', "%$search%"
            );
        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/tour/index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice/tour/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $itinerary = $request->hasFile('itinerary') ? $request->file('itinerary')->store('tour/itinerary') : null;
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('tour/cover') : null;

        $slug = Str::slug($request->name, '-');

        $tour = Tour::create( array_merge( $request->only([
            'name', 'category_id', 'country', 'description', 'subcategory_id', 'city', 'tax', 'itinerary_desc', 'minimum_no_people',
        ]), compact('itinerary', 'cover', 'slug'), [
            'featured' => $request->has('featured'),
            'readily_available' => $request->has('readily_available'),
        ]) );

        $gallery = array_map( function ($image) {
            return ['path' => Storage::putFile('tour/gallery', $image)];
        }, $request->file('gallery') ?? []);

        empty($gallery) ?: $tour->gallery()->createMany($gallery);

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {
            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $tour->currencies()->attach( array_combine( array_map(function ($key) use ($request) {
            return Venue::whereCountry($request->country)->first()->currencies()->whereCode( substr($key, 0, -16) )->first()->id;
        }, array_keys($currencies)), array_map( function ($value) {
            return ['amount' => $value];
        }, $currencies) ) );

        !$request->filled('industries') ?: $tour->industries()->attach($request->industries);


        return back()->with('success', 'Tour has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param Tour $tour
     * @return Response
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tour $tour
     * @return Application|Factory|View
     */
    public function edit(Tour $tour)
    {
        $tour->load('currencies');
        $tour->loadCount('documents', 'schedules');

        return view('backoffice/tour/edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Tour $tour
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Tour $tour)
    {
        if ( $request->hasFile('itinerary') ) {
            $itinerary = $request->file('itinerary')->store('tour/itinerary');
            empty($tour->itinerary) ?: Storage::delete($tour->itinerary);
        }
        else
            $itinerary = $tour->itinerary;

        if ( $request->hasFile('cover') ) {
            $cover = $request->file('cover')->store('tour/cover');
            empty($tour->cover) ?: Storage::delete($tour->cover);
        }
        else
            $cover = $tour->cover;

        $slug = Str::slug($request->name, '-');

        $tour->update( array_merge( $request->only([
            'name', 'category_id', 'country', 'description', 'subcategory_id', 'city', 'tax', 'itinerary_desc', 'minimum_no_people',
        ]), compact('itinerary', 'cover', 'slug'), [
                'featured' => $request->has('featured'),
                'readily_available' => $request->has('readily_available'),
            ]
        ));

        $gallery = array_map( function ($image) {
            return ['path' => Storage::putFile('tour/gallery', $image)];
        }, $request->file('gallery') ?? []);

        empty($gallery) ?: $tour->gallery()->createMany($gallery);

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {
            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $tour->currencies()->sync( array_combine( array_map(function ($key) use ($request) {
            return Venue::whereCountry($request->country)->first()->currencies()->whereCode( substr($key, 0, -16) )->first()->id;
        }, array_keys($currencies)), array_map( function ($value) {
            return ['amount' => $value];
        }, $currencies) ) );

        $tour->industries()->sync($request->industries);

        return back()->with('success', 'Tour has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tour $tour
     * @return RedirectResponse
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();

        return back()->with('success', 'Tour has been deleted');
    }

    /**
     * Export to excel.
     *
     * @return Response
     */
    public function export()
    {
        return ( new TourExcelExport )->download('tours.xlsx');
    }
}
