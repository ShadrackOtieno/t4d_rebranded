<?php

namespace App\Http\Controllers\Backoffice\Review;

use App\CourseBundleReview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseBundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviews = CourseBundleReview::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhereHas('booking.course', function ($query) use ($search) {

                $query->where('name', 'like', "%$search%");
            });

        })->latest()->paginate(10);

        return view('backoffice/review/certification/index', compact('reviews'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseBundleReview  $review
     * @return \Illuminate\Http\Response
     */
    public function show(CourseBundleReview $review)
    {
        return view('backoffice/review/certification/show', compact('review'));
    }
}
