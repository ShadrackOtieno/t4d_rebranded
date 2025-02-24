<?php

namespace App\Http\Controllers\Backoffice\Referral;

use App\Http\Controllers\Controller;
use App\Referral;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Referral\Export\ReferralExcelExport;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $referrals = Referral::when($request->search, function ($query, $search) {

            $query->where(

                'id', 'like', "$search%"

            )->orWhere(

                'name', 'like', "%$search%"

            )->orWhere(

                'email', 'like', "%$search%"
            );

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/referral/index', compact('referrals'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function show(Referral $referral)
    {
        return view('backoffice/referral/show', compact('referral'));
    }

    /**
     * Export to excel.
     * 
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new ReferralExcelExport )->download('referrals.xlsx');
    }
}
