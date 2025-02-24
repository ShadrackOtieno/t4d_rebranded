<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$search = $request->query('search', '');

    	$courses = DB::table('courses')->where('courses.name', 'like', "%$search%")->selectRaw("courses.name, courses.created_at, courses.id, courses.description, 'course' AS model");
    	
    	$software = DB::table('software')->where('software.name', 'like', "%$search%")->selectRaw("software.name, software.created_at, software.id, software.description, 'software' AS model");

    	$tours = DB::table('tours')->where('tours.name', 'like', "%$search%")->selectRaw("tours.name, tours.created_at, tours.id, tours.description, 'tour' AS model");

    	$result = $tours->unionAll($courses)->unionAll($software)->latest()->paginate(10)->appends( $request->query() );

    	return view('front/search', compact('result', 'search'));
    }
}
