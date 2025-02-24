<?php

namespace App\Http\Controllers\Backoffice\Course;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ElearningClassController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        if ( $request->filled('website') ) {

            $course->elearningClass()->updateOrCreate(['course_id' => $course->id], $request->only('website'));

            Session::flash('success', 'E-learning website link has been set');
        }
        else {

            if ( $course->elearningClass()->where('course_id', $course->id)->update([

                'deleted_at' => now()

            ]) ) Session::flash('success', 'E-learning website link has been removed');
        }

        return back();
    }
}
