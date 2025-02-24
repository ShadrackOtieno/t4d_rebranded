<?php

namespace App\Http\Controllers\Backoffice\Company;

use App\Company;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Company\Export\CompanyExcelExport;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $companies = Company::when( $request->search, function ($query, $search) {$query
            ->where('id', 'like', "$search%")
            ->orWhere('name', 'like', "%$search%");
        })->latest()->paginate(25)->appends( $request->query() );

        return view('backoffice/company/index', compact('companies'));
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function confirmedCompanies(Request $request): View
    {
        $companies = Company::when( $request->search, function ($query, $search) {$query
            ->where('id', 'like', "$search%")
            ->orWhere('name', 'like', "%$search%");
        })->where('status', 'Approved')->latest()->paginate(25);

        return view('backoffice/company/index', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View
     */
    public function edit(Company $company)
    {
        $company->loadCount(['pastEmployees', 'currentEmployees', 'approvedAuthorities']);

        $projects = Project::where('company_id', $company->id)->get();

        return view('backoffice/company/edit', compact('company', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice/company/create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $logo = $this->getLogo($request);

        Company::create([
            'name' => $request->name,
            'office_address' => $request->office_address,
            'city' => $request->city,
            'country' => $request->country,
            'segment_id' => $request->segment_id,
            'sector_id' => $request->sector_id,
            'subsector_id' => $request->subsector_id,
            'industry' => $request->industry_id,
            'logo' => $logo,
            'status' => $request->status
        ] );

        return redirect()->route('backoffice.company.confirmed')->with('success', 'Company successfully added');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(Request $request, Company $company)
    {
        $logo = $this->getLogo($request);

        $company->update([
            'name' => $request->name,
            'office_address' => $request->office_address,
            'city' => $request->city,
            'country' => $request->country,
            'logo' => $logo,
            'status' => $request->status,
            'segment_id' => $request->segment_id,
            'sector_id' => $request->sector_id,
            'subsector_id' => $request->subsector_id,
            'industry' => $request->industry_id,
        ] );

        return back()->with('success', 'Company details successfully updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return back()->with('success', 'Company Deletion: Success');
    }

    /**
     * Export to excel.
     *
     * @return Response
     */
    public function export()
    {
        return ( new CompanyExcelExport )->download('companies.xlsx');
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getLogo(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'office_address' => 'min:5|nullable',
            'city' => 'min:2|nullable',
            'industry_id'=>'required',
            'sector_id'=>'required',
            'subsector_id'=>'required',
            'segment_id'=>'required'
        ]);

        $logo = null;
        if ($request->hasFile('logo')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $logo = $request->logo->storeAs('logos', $filename);
        }
        return $logo;
    }
}
