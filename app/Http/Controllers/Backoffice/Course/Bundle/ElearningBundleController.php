<?php

namespace App\Http\Controllers\Backoffice\Course\Bundle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CourseBundle;
use Session;

class ElearningBundleController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseBundle  $bundle
     * @return View
     */
    public function __invoke(Request $request, CourseBundle $bundle)
    {
    	if ( $request->filled('website') ) {

            $bundle->elearningBundle()->updateOrCreate(['course_bundle_id' => $bundle->id], $request->only('website'));

            Session::flash('success', 'E-learning website link has been set');
        }
        else {

            if ( $bundle->elearningBundle()->where('course_bundle_id', $bundle->id)->update([

                'deleted_at' => now()

            ]) ) Session::flash('success', 'E-learning website link has been removed');
        }

        return back();
    }
}
