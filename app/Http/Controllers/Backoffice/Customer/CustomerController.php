<?php

namespace App\Http\Controllers\Backoffice\Customer;

use App\Customer;
use App\User;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backoffice\Customer\Export\CustomerExcelExport;
use Mail;
use App\Mail\Customer\RegistrationMail;
use Hash;
use Str;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $customers = Customer::join(

            'users', 'customers.user_id', '=', 'users.id'

        )->when($request->search, function ($query, $search) {

            $query->where(

                'customers.id', 'like', "$search%"

            )->orWhere(

                'first_name', 'like', "%$search%"

            )->orWhere(

                'last_name', 'like', "%$search%"

            )->orWhere(

                'email', 'like', "%$search%"
            );

        })->selectRaw(

            "customers.*, users.email"

        )->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/customer/index', compact('customers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\View\View
     */
    public function show(Customer $customer)
    {
        return view('backoffice/customer/show', compact('customer'));
    }

    /**
     * create a new customer
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backoffice/customer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'company' => 'required',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'designation' => 'nullable',
            'country' => 'nullable',
            'phone' => 'nullable',
            'work_email' => 'required',
            'salutation' => 'nullable'
        ]);
        # user account
        $user = User::firstOrCreate(['email' => $request->email], [
            'email' => $request->email,
            'password' => Hash::make($password = Str::random(8)),
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        # company
        $company = Company::firstOrCreate(['name' => $request->company], [
            'name' => $request->company,
        ]);

        # customer profile
        if ( $user->wasRecentlyCreated ) {

            $customer = Customer::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'designation' => $request->designation,
                'company_id' => $company->id,
                'country' => $request->country,
                'phone' => '+' . $request->country_code . $request->phone,
                'work_email' => $request->work_email,
                'salutation' => $request->salutation,
            ]);

            Mail::to($user)->send(
                new RegistrationMail($customer, $password)
            );
        }


        return back()->with('success', 'User Addition: Success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'company' => 'required',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'designation' => 'nullable',
            'country' => 'nullable',
            'phone' => 'nullable',
            'work_email' => 'required',
            'salutation' => 'nullable'
        ]);

        # company
        $company = Company::firstOrCreate(['name' => $request->company], [
            'name' => $request->company,
        ]);

        $customer->update(array_merge( $request->only([
            'first_name', 'last_name', 'designation', 'salutation', 'work_email',
            'phone', 'country'
        ]), compact( [
            'company_id' => $company->id
        ])
        ));

        return back()->with('success', 'Customer Details: Updated!');
    }

    /**
     * Export to excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return ( new CustomerExcelExport )->download('customers.xlsx');
    }
}
