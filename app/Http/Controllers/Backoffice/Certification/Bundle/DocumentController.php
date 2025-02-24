<?php

namespace App\Http\Controllers\Backoffice\Certification\Bundle;

use App\Document;
use App\CertificationBundle;
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
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CertificationBundle $bundle)
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

        return view('backoffice/certification/bundle/document/index', compact('bundle', 'documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Document\StoreRequest  $request
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, CertificationBundle $bundle)
    {
        $path = $request->file('document')->store('certification/bundle/documents');

        $bundle->documents()->create( array_merge( $request->only('name'), compact('path') ) );

        return back()->with('success', 'Document has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CertificationBundle  $bundle
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(CertificationBundle $bundle, Document $document)
    {
        return view('backoffice/certification/bundle/document/edit', compact('bundle', 'document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Document\UpdateRequest  $request
     * @param  \App\CertificationBundle  $bundle
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CertificationBundle $bundle, Document $document)
    {
        if ( $request->hasFile('document') ) {

            $path = $request->file('document')->store('certification/documents');

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
     * @param  \App\CertificationBundle  $bundle
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertificationBundle $bundle, Document $document)
    {
        $document->delete();

        return back()->with('success', 'Document has been deleted');
    }
}
