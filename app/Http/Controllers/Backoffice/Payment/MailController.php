<?php

namespace App\Http\Controllers\Backoffice\Payment;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use App\Mail\Backoffice\Payment\InvoiceMail;
use Mail;

class MailController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('backoffice.payment.mail', compact('payment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request, Payment $payment)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);

        if($payment->item->group == 'Yes'){
            Mail::to($payment->customer->account)
                ->send( new InvoiceMail($payment, $request->message) );
        }
        else{
            Mail::to($payment->item->customer->account)
                ->send( new InvoiceMail($payment, $request->message) );
        }

        return redirect()->route('backoffice.invoice.edit', $payment)->with('success', 'Invoice has been sent on mail');
    }
}
