<?php

namespace App\Http\Controllers\Programs;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Program\Program;
use App\Program\ProgramBooking;
use App\Program\BrochureDownload;
use App\Mail\Customer\RegistrationMail;
use App\Mail\Program\ProgramBookingMail;
use App\Mail\Program\BrochureDownloadMail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Customer;
use App\Payment;
use App\User;

use App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $programs = Program::all();

        return view('front.intake_programs.index', compact('programs'));
    }

    /**
     * Display the specified resource.
     *
     * @param String $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $program = Program::where('slug', $slug)->first();

        return view('front.programs.show', compact('program'));
    }

    // this controller is for testing purposes
    public function newpage($slug)
    {
        $program = Program::where('slug', $slug)->first();

        return view('front.intake_programs.show', compact('program'));
    }


    // load the registration view

    public function register($slug)
    {

        $customer = Auth::check()
        ? Customer::whereUserId( Auth::id() )->first()
        : null;

        $user_country = geo()->country_name ?? @$customer->country;

        $program = Program::where('slug', $slug)->first();

        return view('front.programs.register', compact('customer', 'program', 'user_country'));
    }

    // registration for a program
    public function newReg(Request $request, Program $program)
    {
        # user account
        if ( Auth::check() )
            $user = Auth::user();
        else {
            $user = User::firstOrCreate(['email' => $request->email], [
                'email' => $request->email,
                'password' => Hash::make($password = Str::random(8)),
                'role' => 'customer',
                'email_verified_at' => now(),
            ]);
            Auth::login($user, true);
        }

        $this->authorize('customer');

        # customer profile
        if ( $user->wasRecentlyCreated ) {
            $customer = Customer::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'designation' => $request->designation,
                'country' => $request->country,
                'phone' => $request->country_code . $request->phone,
                'work_email' => $request->work_email,
            ]);

            Mail::to($user)->send(
                new RegistrationMail($customer, $password)
            );
        }
        else
            $customer = Customer::whereUserId($user->id)->first();

        # booking
        $booking = ProgramBooking::create( array_merge([
            'program_id' => $program->id,
            'learning_mode' => $request->learning_mode,
            'name' => ucwords("$request->first_name $request->last_name"),
            'phone' => '+' . $request->country_code . $request->phone,
            'personal_email' => $request->email,
            'work_email' => $request->email,
            'salutation' => $request->salutation,
            'designation' => $request->designation,
            'country' => $request->country,
            'payment_method' => $request->payment_method,
            'user_id' => auth()->user()->id,

        ]) );

        # participants
        if ( $participants = json_decode($request->participants) )
            $booking->participants()->createMany( array_map(function ($participant) {
                return get_object_vars($participant);
            }, $participants) );

        # create payment
        Payment::create([
            'amount' => $program->prices->first()->ksh,
            'item_id' => $booking->id,
            'item_type' => get_class($booking),
            'method' => $request->payment_method,
            'currency' => 'KSH/USD',
            'status' => 'pending',
        ]);

        # notify customer on email
        Mail::to($booking->work_email ?? $user->email)->cc($booking->personal_email)->send(
            new ProgramBookingMail($booking)
        );


        # generate page redirect link
        switch ($request->payment_method) {
            case 'paypal':
                dd('paypal');
                break;

            default:
                $redirect_url = route('programs.booking.feedback', [$booking->program->slug]);
                break;
        }

        return redirect($redirect_url);
    }

    // feeback after the registration
    public function feedback($slug)
    {
       $booking = ProgramBooking::where('user_id', auth()->user()->id)->latest()->first();

       return view('front/programs/booking/feedback', compact('booking'));
    }

    // download a brochure
    public function download(Request $request, $slug)
    {
        $attributes =  request()->validate([
            'program' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        BrochureDownload::create($attributes);

        $program = Program::where('slug', $slug)->firstOrFail();

        # notify customer on email
        Mail::to($attributes['email'])->send(
            new BrochureDownloadMail($program)
        );

        return back()->with('success', 'The brochure has been sent to your provided email');
    }
}
