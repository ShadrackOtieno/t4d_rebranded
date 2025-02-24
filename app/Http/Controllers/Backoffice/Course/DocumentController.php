<?php

namespace App\Http\Controllers\Backoffice\Course;

use App\Document;
use App\Course;
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
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Course $course)
    {
        $documents = $course->documents()->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"
    
                )->orWhere(
    
                    'name', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/course/download/index', compact('course', 'documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('backoffice/course/download/create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Download\StoreRequest  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Course $course)
    {
        $path = $request->file('document')->store('course/documents');

        $course->documents()->create( array_merge( $request->only('name'), compact('path') ) );

        return back()->with('success', 'Document has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Document $document)
    {
        return view('backoffice/course/download/edit', compact('course', 'document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Document\UpdateRequest  $request
     * @param  \App\Course  $course
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Course $course, Document $document)
    {
        if ( $request->hasFile('document') ) {

            $path = $request->file('document')->store('course/documents');

            Storage::delete($document->path);
        }
        else
            $path = $document->path;

        $course->documents()->where('id', $document->id)->update( array_merge( $request->only('name'), compact('path') ) );

        return back()->with('success', 'Document has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Document $document)
    {
        $document->delete();

        return back()->with('success', 'Document has been deleted');
    }
}
