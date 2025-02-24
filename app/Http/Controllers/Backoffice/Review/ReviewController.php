<?php

namespace App\Http\Controllers\Backoffice\Review;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Review\Export\ReviewExcelExport;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviews = Review::join(

            'customers', 'reviews.customer_id', '=', 'customers.id'

        )->when( $request->search, function ($query, $search) {

            $query->where(

                'reviews.id', 'like', "$search%"

            )->orWhere(

                'first_name', 'like', "%$search%"

            )->orWhere(

                'last_name', 'like', "%$search%"

            )->orWhereHasMorph('item', 'App\Tour', function ($query) use ($search) {

                $query->where('name', 'like', "%$search%");
            });

        })->latest('reviews.created_at')->paginate(10)->appends( $request->query() );

        return view('backoffice/review/index', compact('reviews'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('backoffice/review/show', compact('review'));
    }

    /**
     * Export to excel.
     * 
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new ReviewExcelExport )->download('reviews.xlsx');
    }
}
