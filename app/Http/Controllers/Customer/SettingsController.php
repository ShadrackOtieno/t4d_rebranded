<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\Settings\UpdateRequest;
use Auth;
use Hash;

class SettingsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $account = Auth::user();

        return view('front/customer/account/profile/settings', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Customer\Settings\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        Auth::user()->update([

            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : Auth::user()->getAuthPassword()
        ]);

        return back()->with('success', 'Account settings has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
