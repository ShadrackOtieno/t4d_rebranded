<?php

namespace App\Http\Controllers\Backoffice\ProductsConfig;

use App\Http\Controllers\Controller;
use App\ProductsConfig\SkillLevel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SkillLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $configurations = SkillLevel::all();
        $type = 'Skill Levels';

        return view('backoffice.pages.products-config.index', compact('configurations', 'type'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $type = 'Skill Levels';

        return view('backoffice.pages.products-config.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        SkillLevel::create($this->ValidatedRequests());

        return redirect(route('backoffice.skill-levels.index'))->with('success', 'Skill Level Creation: Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SkillLevel $skill_level
     * @return Application|Factory|View
     */
    public function edit(SkillLevel $skill_level)
    {
        $type = 'Skill Levels';

        return view('backoffice.pages.products-config.edit', compact('skill_level', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param SkillLevel $skill_level
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, SkillLevel $skill_level)
    {
        $skill_level->update($this->ValidatedRequests());

        return redirect(route('backoffice.skill-levels.index'))->with('success', 'Skill Level Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SkillLevel $skill_level
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(SkillLevel $skill_level): RedirectResponse
    {
        $skill_level->delete();
        return redirect()->back()->with('success', 'Skill Level deleted successfully.');
    }

    /**
     * Validate the request attributes
     *
     * @return array
     */
    protected function ValidatedRequests(): array
    {
        return request()->validate([
            'name' => 'required|min:3',
            'description' => 'sometimes|nullable'
        ]);
    }
}
