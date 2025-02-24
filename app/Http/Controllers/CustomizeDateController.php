<?php

namespace App\Http\Controllers;

use App\CustomizeDate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomizeDateController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'bail|required|min:3',
            'phone_number' => 'nullable|min:5',
            'email' => 'nullable',
            'organization' => 'nullable',
            'number_of_participants' => 'nullable',
            'start_date' => 'nullable'
        ]);
        CustomizeDate::create($request->only([
            'course_id', 'full_name', 'phone_number', 'email', 'organization',
            'number_of_participants', 'start_date'
        ]));

        return back()->with('success', 'Your Customized dates Submission: Success');
    }
}
