<?php

namespace App\Http\Controllers\Backoffice\Programs;
use App\Http\Requests\Backoffice\Programs\StoreIntakesRequest;

use App\Http\Controllers\Controller;
use App\Program\Intake;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Program\Program;
use Illuminate\Http\Response;
use Illuminate\View\View;

class IntakeController extends Controller
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
     * @return Application|Factory|View
     */
    public function create(Program $program)
    {
        return view('backoffice.programs.intakes.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreIntakesRequest  $request
     * @param Program $program
     * @return RedirectResponse
     */
    public function store(StoreIntakesRequest $request, Program $program): RedirectResponse
    {
        Intake::create($request->validated() + ['program_id' => $program->id]);

        return back()->with('success', 'Intake added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Intake  $intake
     * @return Response
     */
    public function show(Intake $intake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Intake  $intake
     * @return Application|Factory|View
     */
    public function edit(Intake $intake)
    {
        return view('backoffice.programs.intakes.edit', compact('intake'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreIntakesRequest  $request
     * @param  Intake  $intake
     * @return RedirectResponse
     */
    public function update(StoreIntakesRequest $request, Intake $intake): RedirectResponse
    {
        $intake->update($request->validated());

        return back()->with('success', 'Intake has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Intake $intake
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Intake $intake): RedirectResponse
    {
        $intake->delete();

        return back()->with('success', 'Intake has been deleted!');
    }
}
