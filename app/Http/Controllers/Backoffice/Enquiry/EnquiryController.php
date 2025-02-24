<?php

namespace App\Http\Controllers\Backoffice\Enquiry;

use App\Enquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Enquiry\Export\EnquiryExcelExport;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $enquiries = Enquiry::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'name', 'like', "%$search%"

            )->orWhere(

                'email', 'like', "%$search%"
            );

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/enquiry/index', compact('enquiries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        return view('backoffice/enquiry/show', compact('enquiry'));
    }

    /**
     * Export to excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new EnquiryExcelExport )->download('enquiries.xlsx');
    }
}
