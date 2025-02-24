<?php

namespace App\Http\Controllers\Backoffice\ProductsConfig;

use App\Http\Controllers\Controller;
use App\ProductsConfig\TargetStaff;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TargetStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $configurations = TargetStaff::all();
        $type = 'Target Staff';

        return view('backoffice.pages.products-config.index', compact('configurations', 'type'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $type = 'Target Staff';

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
        TargetStaff::create($this->ValidatedRequests());

        return redirect(route('backoffice.target-staff.index'))->with('success', 'Target Staff Creation: Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TargetStaff $target_staff
     * @return Application|Factory|View
     */
    public function edit(TargetStaff $target_staff)
    {
        $type = 'Target Staff';

        return view('backoffice.pages.products-config.edit', compact('target_staff', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param TargetStaff $target_staff
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, TargetStaff $target_staff)
    {
        $target_staff->update($this->ValidatedRequests());

        return redirect(route('backoffice.target-staff.index'))->with('success', 'Target Staff Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TargetStaff $target_staff
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(TargetStaff $target_staff): RedirectResponse
    {
        $target_staff->delete();
        return redirect()->back()->with('success', 'Target Staff deleted successfully.');
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
