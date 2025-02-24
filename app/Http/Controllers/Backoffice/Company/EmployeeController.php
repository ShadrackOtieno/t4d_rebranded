<?php

namespace App\Http\Controllers\Backoffice\Company;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Company\Export\EmployeeExcelExport;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @param  string  $status
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Company $company, $status)
    {
        $employees = $company->{ $status.'Employees' }()->join(

            'users', 'customers.user_id', '=', 'users.id'

        )->when($request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'customers.id', 'like', "$search%"
    
                )->orWhere(
    
                    'first_name', 'like', "%$search%"
    
                )->orWhere(
    
                    'last_name', 'like', "%$search%"
    
                )->orWhere(
    
                    'email', 'like', "%$search%"
                );
            });

        })->selectRaw(

            "customers.*, users.email"

        )->latest()->paginate(10)->appends( $request->query() );

        return view("backoffice/company/employee", compact('employees', 'company', 'status'));
    }

    /**
     * Export to excel.
     * 
     * @param  \App\Company  $company
     * @param  string  $status
     * @return \Illuminate\Http\Response
     */
    public function export(Company $company, $status)
    {
        return ( new EmployeeExcelExport($company, $status) )->download("$status employees.xlsx");
    }
}
