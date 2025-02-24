<?php

namespace App\Http\Controllers\Backoffice\Course\Bundle;

use App\Document;
use App\CourseBundle;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Document\StoreRequest;
use App\Http\Requests\Backoffice\Document\UpdateRequest;
use Illuminate\Http\Request;
use Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CourseBundle $bundle)
    {
        $documents = $bundle->documents()->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"
    
                )->orWhere(
    
                    'name', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/bundle/document/index', compact('bundle', 'documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function create(CourseBundle $bundle)
    {
        return view('backoffice/course/bundle/document/create', compact('bundle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Document\StoreRequest  $request
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, CourseBundle $bundle)
    {
        $path = $request->file('document')->store('course/documents');

        $bundle->documents()->create( array_merge( $request->only('name'), compact('path') ) );

        return back()->with('success', 'Document has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseBundle  $bundle
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseBundle $bundle, Document $document)
    {
        return view('backoffice/course/bundle/document/edit', compact('bundle', 'document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Document\UpdateRequest  $request
     * @param  \App\CourseBundle  $bundle
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CourseBundle $bundle, Document $document)
    {
        if ( $request->hasFile('document') ) {

            $path = $request->file('document')->store('course/documents');

            Storage::delete($document->path);
        }
        else
            $path = $document->path;

        $bundle->documents()->where('id', $document->id)->update( array_merge( $request->only('name'), compact('path') ) );

        return back()->with('success', 'Document has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseBundle  $bundle
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseBundle $bundle, Document $document)
    {
        $document->delete();

        return back()->with('success', 'Document has been deleted');
    }
}
