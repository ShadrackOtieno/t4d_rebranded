<?php

namespace App\Http\Controllers\Backoffice\ProductsConfig;

use App\Http\Controllers\Controller;
use App\ProductsConfig\BCGLevel;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class BCGLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $configurations = BCGLevel::all();
        $type = 'BCG Levels';

        return view('backoffice.pages.products-config.index', compact('configurations', 'type'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $type = 'BCG Levels';

        return view('backoffice.pages.products-config.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function store()
    {
        BCGLevel::create($this->ValidatedRequests());

        return redirect(route('backoffice.bcg-levels.index'))->with('success', 'BCG Level Creation: Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BCGLevel $bcg_level
     * @return Application|Factory|View
     */
    public function edit(BCGLevel $bcg_level)
    {
        $type = 'BCG Levels';

        return view('backoffice.pages.products-config.edit', compact('bcg_level', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BCGLevel $bcg_level
     * @return Application|RedirectResponse|Redirector
     */
    public function update(BCGLevel $bcg_level)
    {
        $bcg_level->update($this->ValidatedRequests());

        return redirect(route('backoffice.bcg-levels.index'))->with('success', 'BCG Level Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BCGLevel $bcg_level
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(BCGLevel $bcg_level): RedirectResponse
    {
        $bcg_level->delete();
        return redirect()->back()->with('success', 'BCG Level deleted successfully.');
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
