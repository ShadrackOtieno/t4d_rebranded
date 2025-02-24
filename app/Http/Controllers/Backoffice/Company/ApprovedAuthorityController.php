<?php

namespace App\Http\Controllers\Backoffice\Company;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Company\Export\ApprovedAuthorityExcelExport;

class ApprovedAuthorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Company $company)
    {
        $approved_authorities = $company->approvedAuthorities()->when( $request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"
    
                )->orWhere(
    
                    'name', 'like', "%$search%"
    
                )->orWhere(
    
                    'phone', 'like', "%$search%"
    
                )->orWhere(
    
                    'designation', 'like', "%$search%"
    
                )->orWhere(
    
                    'email', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view("backoffice/company/approved_authority", compact('approved_authorities', 'company'));
    }

    /**
     * Export to excel.
     * 
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function export(Company $company)
    {
        return ( new ApprovedAuthorityExcelExport($company) )->download("$company->name approved authorities.xlsx");
    }
}
