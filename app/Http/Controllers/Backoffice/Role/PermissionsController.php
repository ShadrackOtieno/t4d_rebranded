<?php

namespace App\Http\Controllers\Backoffice\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('backoffice/role/permissions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|min:3',
            'label' => 'required|min:3',
        ]);

        Permission::create(array_merge( $request->only([
            'name', 'label'
        ])));

         return redirect()->back()->with('success', 'Permission Addition: Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission $permission
     * @return View
     */
    public function edit(Permission $permission)
    {
        return view('backoffice/role/edit-permission', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Permission  $permission
     * @return RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'label' => 'bail|required|min:3'
        ]);

        $permission->update(array_merge( $request->only([
            'label'
        ])));

         return redirect()->back()->with('success', 'Permission Update: Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
