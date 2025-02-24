<?php

namespace App\Http\Controllers\Backoffice\ProductsConfig;

use App\Http\Controllers\Controller;
use App\ProductsConfig\PDCStage;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class PDCStageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $configurations = PDCStage::all();
        $type = 'PDC Stages';

        return view('backoffice.pages.products-config.index', compact('configurations', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $type = 'PDC Stages';

        return view('backoffice.pages.products-config.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function store()
    {
        PDCStage::create($this->ValidatedRequests());

        return redirect(route('backoffice.pdc-stages.index'))->with('success', 'PDC Stages Creation: Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PDCStage $pdc_stage
     * @return Application|Factory|View
     */
    public function edit(PDCStage $pdc_stage)
    {
        $type = 'PDC Stages';

        return view('backoffice.pages.products-config.edit', compact('pdc_stage', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PDCStage $pdc_stage
     * @return Application|Redirector|RedirectResponse
     */
    public function update(PDCStage $pdc_stage)
    {
        $pdc_stage->update($this->ValidatedRequests());

        return redirect(route('backoffice.pdc-stages.index'))->with('success', 'PDC Stage Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PDCStage $pdc_stage
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(PDCStage $pdc_stage): RedirectResponse
    {
        $pdc_stage->delete();
        return redirect()->back()->with('success', 'PDC Stage deleted successfully.');
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
