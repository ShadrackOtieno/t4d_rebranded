<?php

namespace App\Http\Controllers\Backoffice;

use App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Profile\StoreRequest;
use Auth;
use Hash;
use DB;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = Staff::whereUserId( Auth::id() )->first();

        return view('backoffice/profile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Profile\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request)
    {
        Auth::user()->update([

            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : Auth::user()->getAuthPassword()
        ]);

        DB::table('staff')->where( 'user_id', Auth::id() )->update( $request->only(['first_name', 'last_name', 'phone']) );

        return back()->with('success', 'Profile has been updated');
    }
}
