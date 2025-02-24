<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Company;
use App\User;
use App\Http\Requests\Customer\Account\StoreRequest;
use App\Http\Requests\Customer\Account\UpdateRequest;
use Hash;
use Auth;

class AccountController extends Controller
{
    /**
     * AccountController constructor.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->only('create', 'store');

        $this->middleware('auth')->except('create', 'store');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Customer\Account\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        # create account
        $user = User::create([

            'password' => Hash::make($request->password),
            'email' => $request->personal_email,
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        # save profile
        Customer::create([

            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        # Login and "remember" the given user...
        Auth::login($user, true);

        return redirect()->route('customer.account.profile.edit')->with('success', 'Your account is ready to go. You can proceed to edit your profile.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $customer = Customer::whereUserId( Auth::id() )->first();

        return view('front/customer/account/profile/show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $customer = Customer::whereUserId( Auth::id() )->first();

        return view('front/customer/account/profile/edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Customer\Account\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        $company = Company::firstOrCreate([

            'name' => $request->company,

        ], ['name' => $request->company]);

        Customer::whereUserId( Auth::id() )->update( array_merge( $request->only([

            'first_name', 'last_name', 'designation', 'country', 'phone', 'work_email', 'salutation',
            
        ]), ['company_id' => $company->id]) );

        return back()->with('success', 'Your profile has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
