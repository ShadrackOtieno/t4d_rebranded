<?php

namespace App\Http\Controllers\Backoffice\Staff;

use App\Http\Controllers\Controller;
use App\Staff;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Staff\StoreRequest;
use App\Http\Requests\Backoffice\Staff\UpdateRequest;
use App\Mail\Backoffice\Staff\RegistrationMail;
use App\Http\Controllers\Backoffice\Staff\Export\StaffExcelExport;
use Hash;
use DB;
use Str;
use Mail;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $staff = Staff::join(

            'users', 'staff.user_id', '=', 'users.id'

        )->when($request->search, function ($query, $search) {

            $query->where(

                'staff.id', 'like', "$search%"

            )->orWhere(

                'first_name', 'like', "%$search%"

            )->orWhere(

                'last_name', 'like', "%$search%"

            )->orWhere(

                'email', 'like', "%$search%"
                
            )->orWhere(

                'phone', 'like', "%$search%"

            )->orWhere(

                'role', 'like', "%$search%"
            );

        })->selectRaw(

            "staff.*, users.email, users.role"

        )->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/staff/index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice/staff/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Staff\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = User::create( array_merge( $request->only(['email', 'role']), [

            'password' => Hash::make( $password = Str::random(6) )
        ]) );

        $staff = Staff::create( array_merge( $request->only(['first_name', 'last_name', 'phone']), [

            'user_id' => $user->id
        ]) );

        Mail::to($user)->send( new RegistrationMail($staff, $password) );

        return back()->with('success', 'Staff has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('backoffice/staff/edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Staff\UpdateRequest  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Staff $staff)
    {
        $staff->account()->update( $request->only(['email', 'role']) );

        $staff->update( $request->only(['first_name', 'last_name', 'phone']) );

        return back()->with('success', 'Staff has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return back()->with('success', 'Staff has been deleted');
    }

    /**
     * Export to excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new StaffExcelExport )->download('staff.xlsx');
    }

    /**
     * Assign role to staff.
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignRole(Request $request, User $user)
    {
        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'Role assigned to staff');
    }

    /**
     * Delete assigned role.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeRole(Request $request, User $user)
    {
        DB::table('role_user')->where('role_id', $request->role)
                    ->where('user_id', $user->id)->delete();

        return redirect()->back()->with('success', 'Role removed from staff');
    }
}
