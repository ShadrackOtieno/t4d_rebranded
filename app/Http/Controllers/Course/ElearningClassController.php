<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;

class ElearningClassController extends Controller
{
    /**
     * Display a listing of the resource by title.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::has('elearningClass')->get();

        return view('front/course/elearning/index', compact('courses'));
    }
}
