<?php

namespace App\Http\Controllers\Backoffice;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the form for a resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'name', 'like', "%$search%"
                
            )->orWhere(

                'email', 'like', "%$search%"
            );

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice.contact.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('backoffice.contact.show', compact('contact'));
    }
}
