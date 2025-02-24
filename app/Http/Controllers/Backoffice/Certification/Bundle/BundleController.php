<?php

namespace App\Http\Controllers\Backoffice\Certification\Bundle;

use App\CertificationBundle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Certification\Bundle\StoreRequest;
use App\Http\Requests\Backoffice\Certification\Bundle\UpdateRequest;
use App\Http\Controllers\Backoffice\Certification\Bundle\Export\BundleExcelExport;
use Storage;
use Str;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bundles = CertificationBundle::when( $request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'name', 'like', "%$search%"
            );

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/certification/bundle/index', compact('bundles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice/certification/bundle/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\Bundle\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('certification/bundle/cover') : null;

        $slug = Str::slug($request->name, '-');

        $bundle = CertificationBundle::create( array_merge(

            $request->all(), compact('cover', 'slug'), [

            'event_types' => implode(' | ', $request->event_types),
            'featured' => $request->has('featured') ? true : false,
        ]) );

        $bundle->certifications()->attach($request->certifications);

        $bundle->trainers()->attach($request->trainers);

        !$request->filled('software') ?: $bundle->software()->attach($request->software);

        !$request->filled('tours') ?: $bundle->tours()->attach($request->tours);

        return back()->with('success', 'Certification bundle has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificationBundle $bundle)
    {
        return view('backoffice/certification/bundle/edit', compact('bundle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\Bundle\UpdateRequest  $request
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CertificationBundle $bundle)
    {
        if ( $request->hasFile('cover') ) {

            $cover = $request->file('cover')->store('certification/bundle/cover');

            empty($bundle->cover) ?: Storage::delete($bundle->cover);
        }
        else
            $cover = $bundle->cover;

        $slug = Str::slug($request->name, '-');

        $bundle->update( array_merge( $request->only([

            'name', 'description', 'outline', 'module', 'category_id', 'subcategory_id', 'code',

        ]), compact('cover', 'slug'), [

            'event_types' => implode(' | ', $request->event_types),
            'featured' => $request->has('featured') ? true : false,
        ]) );

        $bundle->certifications()->sync($request->certifications);

        $bundle->trainers()->sync($request->trainers);

        $bundle->software()->sync($request->software);

        $bundle->tours()->sync($request->tours);

        return back()->with('success', 'Certification bundle has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificationBundle $bundle)
    {
        $bundle->delete();

        return back()->with('success', 'Certification bundle has been deleted');
    }

    /**
     * Export to excel.
     * 
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return (new BundleExcelExport)->download("certification bundles.xlsx");
    }
}
