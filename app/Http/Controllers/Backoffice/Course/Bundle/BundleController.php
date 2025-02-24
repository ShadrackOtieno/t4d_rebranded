<?php

namespace App\Http\Controllers\Backoffice\Course\Bundle;

use App\CourseBundle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Course\Bundle\StoreRequest;
use App\Http\Requests\Backoffice\Course\Bundle\UpdateRequest;
use App\Http\Controllers\Backoffice\Course\Export\BundleExport;
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
        $bundles = CourseBundle::when( $request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'name', 'like', "%$search%"
            );

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/bundle/index', compact('bundles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice/course/bundle/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\Bundle\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('course/bundle/cover') : null;

        $slug = Str::slug($request->name, '-');

        $bundle = CourseBundle::create( array_merge(

            $request->all(), compact('cover', 'slug'), [

            'event_types' => implode(' | ', $request->event_types),
            'featured' => $request->has('featured') ? true : false,
        ]) );

        $bundle->courses()->attach($request->courses);

        $bundle->trainers()->attach($request->trainers);

        !$request->filled('software') ?: $bundle->software()->attach($request->software);

        !$request->filled('tours') ?: $bundle->tours()->attach($request->tours);

        return back()->with('success', 'Course bundle has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseBundle $bundle)
    {
        $bundle->loadCount('documents', 'physicalBundles', 'virtualBundles');

        return view('backoffice/course/bundle/edit', compact('bundle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Course\Bundle\UpdateRequest  $request
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CourseBundle $bundle)
    {
        if ( $request->hasFile('cover') ) {

            $cover = $request->file('cover')->store('course/bundle/cover');

            empty($bundle->cover) ?: Storage::delete($bundle->cover);
        }
        else
            $cover = $bundle->cover;

        $slug = Str::slug($request->name, '-');

        $bundle->update( array_merge( $request->only([

            'name', 'description', 'outline', 'module', 'category_id', 'subcategory_id', 'code', 'adminstration_details', 'topic_id',

        ]), compact('cover', 'slug'), [

            'event_types' => implode(' | ', $request->event_types),
            'featured' => $request->has('featured') ? true : false,
        ]) );

        $bundle->courses()->sync($request->courses);

        $bundle->trainers()->sync($request->trainers);

        $bundle->software()->sync($request->software);

        $bundle->tours()->sync($request->tours);

        return back()->with('success', 'Course bundle has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseBundle $bundle)
    {
        $bundle->delete();

        return back()->with('success', 'Course bundle has been deleted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new BundleExport )->download('Course Bundles.xlsx');
    }
}
