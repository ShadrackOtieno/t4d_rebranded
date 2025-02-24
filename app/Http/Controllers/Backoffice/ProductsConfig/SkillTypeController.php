<?php

namespace App\Http\Controllers\Backoffice\ProductsConfig;

use App\Http\Controllers\Controller;
use App\ProductsConfig\SkillType;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SkillTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $configurations = SkillType::all();
        $type = 'Skill Types';

        return view('backoffice.pages.products-config.index', compact('configurations', 'type'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $type = 'Skill Types';

        return view('backoffice.pages.products-config.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        SkillType::create($this->ValidatedRequests());

        return redirect(route('backoffice.skill-types.index'))->with('success', 'Skill Type Creation: Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SkillType $skill_type
     * @return Application|Redirector|RedirectResponse
     */
    public function edit(SkillType $skill_type)
    {
        $type = 'SKill Types';

        return view('backoffice.pages.products-config.edit', compact('skill_type', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param SkillType $skill_type
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, SkillType $skill_type)
    {
        $skill_type->update($this->ValidatedRequests());

        return redirect(route('backoffice.skill-types.index'))->with('success', 'Skill Type Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SkillType $skill_type
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(SkillType $skill_type): RedirectResponse
    {
        $skill_type->delete();
        return redirect()->back()->with('success', 'Skill Type deleted successfully.');
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
