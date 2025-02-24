<?php

namespace App\Http\Controllers\Backoffice\Role;

use App\Http\Controllers\Controller;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('backoffice/role/roles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|min:3',
            'label' => 'required|min:3',
        ]);

        Role::create(array_merge( $request->only([
            'name', 'label'
        ])));

         return redirect()->back()->with('success', 'Role Addition: Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return View
     */
    public function edit(Role $role)
    {
        return view('backoffice/role/edit-role', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'label' => 'bail|required|min:3'
        ]);

        $role->update(array_merge( $request->only([
            'label'
        ])));

         return redirect()->back()->with('success', 'Role Update: Success');
    }

    /**
     * Assign permission to role.
     * @param  Role $role
     * @return RedirectResponse
     */
    public function assignPermission(Request $request, Role $role)
    {
        try {
            $role->givePermissionTo($request->permission); 
            return redirect()->back()->with('success', 'Permision assigned to role');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Permision already assigned to role');
        }
    }
    

    /**
     * Delete assigned permission to role.
     *
     * @param  Role  $role
     * @return RedirectResponse
     */
    public function invokePermission(Request $request, Role $role)
    {
        DB::table('permission_role')->where('role_id', $role->id)
                    ->where('permission_id', $request->permission)->delete();

        return redirect()->back()->with('success', 'Permission removed from Role');
    }
    
}
