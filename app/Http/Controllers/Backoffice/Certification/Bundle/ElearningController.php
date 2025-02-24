<?php

namespace App\Http\Controllers\Backoffice\Certification\Bundle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CertificationBundle;
use Session;

class ElearningController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CertificationBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, CertificationBundle $bundle)
    {
        if ( $request->filled('website') ) {

            $bundle->elearningClass()->updateOrCreate(['certification_bundle_id' => $bundle->id], $request->only('website'));

            Session::flash('success', 'E-learning website link has been set');
        }
        else {

            if ( $bundle->elearningClass()->where('certification_bundle_id', $bundle->id)->update([

                'deleted_at' => now()

            ]) ) Session::flash('success', 'E-learning website link has been removed');
        }

        return back();
    }
}
