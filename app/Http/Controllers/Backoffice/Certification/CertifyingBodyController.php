<?php

namespace App\Http\Controllers\Backoffice\Certification;

use App\CertifyingBody;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Certification\CertifyingBody\StoreRequest;
use App\Http\Requests\Backoffice\Certification\CertifyingBody\UpdateRequest;

class CertifyingBodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $certifying_bodies = CertifyingBody::when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"

                )->orWhere(

                    'name', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/certification/certifying_body/index', compact('certifying_bodies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\CertifyingBody\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('certification/certifying_body') : null;

        CertifyingBody::create( array_merge( $request->only(['name', 'description']), compact('cover')) );

        return back()->with('success', 'Certifying body has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CertifyingBody  $certifying_body
     * @return \Illuminate\Http\Response
     */
    public function edit(CertifyingBody $certifying_body)
    {
        return view('backoffice/certification/certifying_body/edit', compact('certifying_body'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Certification\CertifyingBody\UpdateRequest  $request
     * @param  \App\CertifyingBody  $certifying_body
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CertifyingBody $certifying_body)
    {
        if ( $request->hasFile('cover') ) {

            $cover = $request->file('cover')->store('certification/certifying_body');

            empty($certifying_body->cover) ?: Storage::delete($certifying_body->cover);
        }
        else
            $cover = $certifying_body->cover;

        $certifying_body->update( array_merge( $request->only(['name', 'description']), [

            'cover' => $cover, 
        ]) );

        return back()->with('success', 'Certifying body has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CertifyingBody  $certifying_body
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertifyingBody $certifying_body)
    {
        $certifying_body->delete();

        return back()->with('success', 'Certifying body has been deleted');
    }
}
