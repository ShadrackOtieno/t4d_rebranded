<?php

namespace App\Http\Controllers\Backoffice\Certification;

use App\ElearningCertification;
use App\Certification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ElearningController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Certification $certification)
    {
        if ( $request->filled('website') ) {

            $certification->elearningClass()->updateOrCreate(['certification_id' => $certification->id], $request->only('website'));

            Session::flash('success', 'E-learning website link has been set');
        }
        else {

            if ( $certification->elearningClass()->where('certification_id', $certification->id)->update([

                'deleted_at' => now()

            ]) ) Session::flash('success', 'E-learning website link has been removed');
        }

        return back();
    }
}
