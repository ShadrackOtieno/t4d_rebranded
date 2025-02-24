<?php

namespace App\Http\Controllers\Backoffice\Tour;

use App\Document;
use App\Tour;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Document\StoreRequest;
use App\Http\Requests\Backoffice\Document\UpdateRequest;
use Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Tour $tour)
    {
        $documents = $tour->documents()->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"
    
                )->orWhere(
    
                    'name', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/tour/document/index', compact('tour', 'documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function create(Tour $tour)
    {
        return view('backoffice/tour/document/create', compact('tour'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Document\StoreRequest  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Tour $tour)
    {
        $path = $request->file('document')->store('tour/documents');

        $tour->documents()->create( array_merge( $request->only('name'), compact('path') ) );

        return back()->with('success', 'Document has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tour  $tour
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Tour $tour, Document $document)
    {
        return view('backoffice/tour/document/edit', compact('tour', 'document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Document\UpdateRequest  $request
     * @param  \App\Tour  $tour
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Tour $tour, Document $document)
    {
        if ( $request->hasFile('document') ) {

            $path = $request->file('document')->store('tour/documents');

            Storage::delete($document->path);
        }
        else
            $path = $document->path;

        $tour->documents()->where('id', $document->id)->update( array_merge( $request->only('name'), compact('path') ) );

        return back()->with('success', 'Document has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tour  $tour
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour, Document $document)
    {
        $document->delete();

        return back()->with('success', 'Document has been deleted');
    }
}
