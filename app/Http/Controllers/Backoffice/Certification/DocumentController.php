<?php

namespace App\Http\Controllers\Backoffice\Certification;

use App\Document;
use App\Certification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Document\StoreRequest;
use App\Http\Requests\Backoffice\Document\UpdateRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Certification $certification)
    {
        $documents = $certification->documents()->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"
    
                )->orWhere(
    
                    'name', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/certification/document/index', compact('certification', 'documents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Document\StoreRequest  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Certification $certification)
    {
        $path = $request->file('document')->store('certification/documents');

        $certification->documents()->create( array_merge( $request->only('name'), compact('path') ) );

        return back()->with('success', 'Document has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certification  $certification
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification, Document $document)
    {
        return view('backoffice/certification/document/edit', compact('certification', 'document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Document\UpdateRequest  $request
     * @param  \App\Certification  $certification
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Certification $certification, Document $document)
    {
        if ( $request->hasFile('document') ) {

            $path = $request->file('document')->store('certification/documents');

            Storage::delete($document->path);
        }
        else
            $path = $document->path;

        $certification->documents()->where('id', $document->id)->update( array_merge( $request->only('name'), compact('path') ) );

        return back()->with('success', 'Document has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certification  $certification
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certification $certification, Document $document)
    {
        $document->delete();

        return back()->with('success', 'Document has been deleted');
    }
}
