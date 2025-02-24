<?php

namespace App\Http\Controllers\Backoffice\Software;

use App\Http\Controllers\Controller;
use App\SoftwareQuotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Software\Export\QuoteExcelExport;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $quotes = SoftwareQuotation::join(

            'software', 'software_quotations.software_id', '=', 'software.id'

        )->when( $request->search, function ($query, $search) {

            $query->where(

                'software_quotations.id', 'like', "$search%"

            )->orWhere(

                'software_quotations.name', 'like', "%$search%"

            )->orWhere(

                'software_quotations.email', 'like', "%$search%"

            )->orWhere(

                'software_quotations.phone', 'like', "%$search%"

            )->orWhere(

                'software.name', 'like', "%$search%"
            );

        })->selectRaw(

            "software_quotations.*, software.name AS software"

        )->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/software/quotation/index', compact('quotes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoftwareQuotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(SoftwareQuotation $quotation)
    {
        return view('backoffice/software/quotation/show', compact('quotation'));
    }

    /**
     * Export to excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new QuoteExcelExport )->download('enterprise systems quotation requests.xlsx');
    }
}
