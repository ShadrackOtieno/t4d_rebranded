<?php

namespace App\Http\Controllers\Backoffice\Project;

use App\Company;
use App\FAQ;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Company $company)
    {
        return view('backoffice/projects/create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|min:5',
            'description' => 'required|min:5',
            'company' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'cost_estimate' => 'min:2',
            'status' => 'required'
        ]);

        Project::create(array_merge( $request->only([
            'name', 'description', 'start_date', 'end_date', 'cost_estimate', 'status'
        ]),
            ['company_id' => $request->company]
        ));

         return redirect()->route('backoffice.company.edit', $request->company)->with('success', 'Project Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return Application|Factory|View
     */
    public function edit(Project $project)
    {
        return view('backoffice/projects/edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Project $project
     * @return Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'bail|required|min:5',
            'description' => 'required|min:5',
            'company' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'cost_estimate' => 'min:2',
            'status' => 'required'
        ]);

        $project->update(array_merge( $request->only([
            'name', 'description', 'start_date', 'end_date', 'cost_estimate', 'status'
        ]),
            ['company_id' => $request->company]
        ));

        return redirect()->route('backoffice.company.edit', $request->company)->with('success', 'Project Update: Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return back()->with('success', 'Project Deleted');
    }
}
