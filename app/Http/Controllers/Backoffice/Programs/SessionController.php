<?php

namespace App\Http\Controllers\Backoffice\Programs;

use App\Http\Controllers\Controller;
use App\Program\Session;
use App\Program\ProgramModule;
use App\Program\Program;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Programs\StoreSessionRequest;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SessionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Program $program)
    {
        $modules = ProgramModule::where('program_id', $program->id)->get();

        return view('backoffice.programs.sessions.create', compact('modules', 'program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSessionRequest  $request
     * @param  Program  $program
     * @return RedirectResponse
     */
    public function store(Program $program, StoreSessionRequest $request)
    {
        Session::create($request->validated() + ['program_id' => $program->id]);

        return back()->with('success', 'Session has been addded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Session $session
     * @param Program $program
     * @return Application|Factory|View
     */
    public function edit(Session $session, Program $program)
    {
        $modules = ProgramModule::where('program_id', $program->id)->get();

        return view('backoffice.programs.sessions.edit', compact('modules', 'session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreSessionRequest $request
     * @param Session $session
     * @return RedirectResponse
     */
    public function update(StoreSessionRequest $request, Session $session): RedirectResponse
    {
        $session->update($request->validated());

        return back()->with('success', 'Session has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Session $session
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Session $session): RedirectResponse
    {
        $session->delete();

        return back()->with('success', 'Session has been deleted!');
    }
}
