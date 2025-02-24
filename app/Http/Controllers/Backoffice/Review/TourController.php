<?php

namespace App\Http\Controllers\Backoffice\Review;

use App\Http\Controllers\Controller;
use App\TourReview;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviews = TourReview::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhereHas('booking.course', function ($query) use ($search) {

                $query->where('name', 'like', "%$search%");
            });

        })->latest()->paginate(10);

        return view('backoffice/review/tour/index', compact('reviews'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TourReview  $review
     * @return \Illuminate\Http\Response
     */
    public function show(TourReview $review)
    {
        return view('backoffice/review/tour/show', compact('review'));
    }
}
