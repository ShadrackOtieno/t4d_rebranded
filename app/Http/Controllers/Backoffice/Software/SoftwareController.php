<?php

namespace App\Http\Controllers\Backoffice\Software;

use App\Http\Controllers\Controller;
use App\Software;
use App\SoftwareQuotation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Software\StoreRequest;
use App\Http\Requests\Backoffice\Software\UpdateRequest;
use App\Http\Controllers\Backoffice\Software\Export\SoftwareExcelExport;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Storage;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $softwares = Software::when($request->search, function ($query, $search) {
            $query->where(
                'id', 'like', "$search%"
            )->orWhere(
                'name', 'like', "%$search%"
            );
        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/software/index', compact('softwares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice/software/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $brochure = $request->hasFile('brochure') ? $request->file('brochure')->store('software/brochure') : null;

        $cover = $request->hasFile('cover') ? $request->file('cover')->store('software/cover') : null;

        $software = Software::create( array_merge( $request->only([
            'name', 'price', 'category_id', 'highlights', 'description', 'subcategory_id',
        ]), compact('brochure', 'cover'), [
            'featured' => $request->has('featured')
        ]) );

        $gallery = array_map( function ($image) {
            return [
                'path' => Storage::putFile('software/gallery', $image)
            ];

        }, $request->gallery ?? []);

        $software->gallery()->createMany($gallery);
        !$request->filled('industries') ?: $software->industries()->attach($request->industries);

        return back()->with('success', 'Enterprise system has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Software $software
     * @return Application|Factory|View
     */
    public function edit(Software $software)
    {
        return view('backoffice/software/edit', compact('software'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Software $software
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Software $software)
    {
        if ( $request->hasFile('brochure') ) {
            $brochure = $request->file('brochure')->store('software/brochure');
            empty($software->brochure) ?: Storage::delete($software->brochure);
        }
        else
            $brochure = $software->brochure;

        if ( $request->hasFile('cover') ) {
            $cover = $request->file('cover')->store('software/cover');
            empty($software->cover) ?: Storage::delete($software->cover);
        }
        else
            $cover = $software->cover;

        $software->update( array_merge( $request->only([
            'name', 'price', 'category_id', 'highlights', 'description', 'subcategory_id'
        ]), compact('brochure', 'cover'), [
            'featured' => $request->has('featured')
        ]) );

        $gallery = array_map( function ($image) {
            return [
                'path' => Storage::putFile('software/gallery', $image)
            ];
        }, $request->gallery ?? []);

        $software->gallery()->createMany($gallery);
        $software->industries()->sync($request->industries);

        return back()->with('success', 'Enterprise system has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Software $software
     * @return RedirectResponse
     */
    public function destroy(Software $software)
    {
        $software->delete();

        return back()->with('success', 'Enterprise system has been deleted');
    }

    /**
     * Export to excel.
     *
     * @return Response
     */
    public function export()
    {
        return ( new SoftwareExcelExport )->download('Enterprise Systems.xlsx');
    }
}
