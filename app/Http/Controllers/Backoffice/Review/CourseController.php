<?php

namespace App\Http\Controllers\Backoffice\Review;

use App\CourseReview;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviews = CourseReview::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhereHas('booking.course', function ($query) use ($search) {

                $query->where('name', 'like', "%$search%");
            });

        })->latest()->paginate(10);

        return view('backoffice/review/course/index', compact('reviews'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseReview  $review
     * @return \Illuminate\Http\Response
     */
    public function show(CourseReview $review)
    {
        return view('backoffice/review/course/show', compact('review'));
    }
}
