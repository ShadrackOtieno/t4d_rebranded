<?php

namespace App\Http\Controllers\Backoffice\Programs;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Programs\StoreModuleRequest;
use App\Program\Module;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $modules = Module::all();

        return view('backoffice.programs.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backoffice.programs.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreModuleRequest  $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(StoreModuleRequest $request)
    {
        Module::create($request->validated());

        return redirect(route('backoffice.programs.modules.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Module $module
     * @return Application|Factory|View
     */
    public function edit(Module $module)
    {
        return view('backoffice.programs.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreModuleRequest  $request
     * @param  Module $module
     * @return Application|Redirector|RedirectResponse
     */
    public function update(StoreModuleRequest $request, Module $module)
    {
        $module->update($request->validated());

        return redirect(route('backoffice.programs.modules.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Module $module
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Module $module): RedirectResponse
    {
        $module->delete();

        return back();
    }
}
