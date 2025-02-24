<?php

namespace App\Http\Controllers\Backoffice\CareerModule;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Career\CareerModuleRequest;
use Illuminate\Http\Request;
use App\CareerModule;

class CareerModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|View
     */
    public function index()
    {
        //
        $careers = CareerModule::paginate(15);

        return view('backoffice/career-module/index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|View
     */
    public function create()
    {
        //
        return view('backoffice/career-module/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(CareerModuleRequest $request)
    {
        //Insert infor into the databases
        
        
        CareerModule::create([
            'Job_title' => $request->title,
            'Department' => $request->department,
            'Category' => $request->Job_Category,
            'Experience' => $request->experience,
            'Description' => $request->Job_description,
            'Requirements' => $request->requirements,
            'Apply_before' => $request->date
        ] );
        /**/
        
        return back()->with('success', 'Career Module has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        //
        $career = CareerModule::find($id);

        return view('backoffice/career-module/edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function update(CareerModuleRequest $request, $id)
    {
        //
        $career = CareerModule::find($id);
        //$Photos = $this->getPage($request, $project);
         
        $career->update([
            'Job_title' => $request->title,
            'Department' => $request->department,
            'Category' => $request->Job_Category,
            'Experience' => $request->experience,
            'Description' => $request->Job_description,
            'Requirements' => $request->requirements,
            'Apply_before' => $request->date
        ]);
         /*  */

        return back()->with('success', 'Career module has been updated');
        //return dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
        
        $career = CareerModule::find($id);

        $career->delete();

        return back()->with('success', 'Career Module has been deleted');
    }
}
