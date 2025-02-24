<?php

namespace App\Http\Controllers\Backoffice\Programs;
use App\Http\Requests\Backoffice\Programs\StoreProgramModuleRequest;

use App\Http\Controllers\Controller;
use App\Program\ProgramModule;
use App\Program\Program;
use App\Program\Module;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProgramModuleController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Program $program)
    {
        $modules = Module::all();

        return view('backoffice.programs.program_modules.create', compact('program', 'modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProgramModuleRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreProgramModuleRequest $request, Program $program): RedirectResponse
    {
        ProgramModule::create($request->validated() + ['program_id' => $program->id]);

        return back()->with('success', 'Module has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProgramModule  $programModule
     * @return Application|Factory|View
     */
    public function edit(ProgramModule $programModule)
    {
        $modules = Module::all();

        return view('backoffice.programs.program_modules.edit', compact('programModule', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProgramModuleRequest $request
     * @param  ProgramModule  $programModule
     * @return RedirectResponse
     */
    public function update(StoreProgramModuleRequest $request, ProgramModule $programModule): RedirectResponse
    {
        $programModule->update($request->validated());

        return back()->with('success', 'Module has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProgramModule $programModule
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(ProgramModule $programModule): RedirectResponse
    {
        $programModule->delete();

        return back()->with('success', 'Module has been deleted');
    }
}
