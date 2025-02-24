<title>Invoice Attachment</title>

@php
    if (
        isset($payment->item->country)

        and

        App\Venue::whereCountry($payment->item->country)->exists()
    )
        $venue = App\Venue::whereCountry($payment->item->country)->first();
    else
        $venue = App\Venue::whereHeadOffice(true)->first();

@endphp

<div class="clearfix">
    <img class="right" src="{{ public_path('images/ires-letter-head.webp') }}" height="70px" alt="ires-letter-head">
</div>

<table>
    <tr>
        <td class="text-left">
            COMPANY REGISTRATION NO: {{ @$venue->reg_no }}
        </td>
        <td class="text-right">
            TAX PIN: {{ @$venue->tax_pin }}
        </td>
    </tr>
</table>

<h1 class="text-center">INVOICE</h1>

<div class="container">
    <table cellspacing="40">
        <tr>
            <td>
                <table class="table-border" cellpadding="5">
                    <tr>
                        <td>
                            <strong>
                                Attention To:
                            </strong>
                        </td>
                        <td>
                            {{ $payment->customer->name ?? @$payment->item->customer->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Organization:
                            </strong>
                        </td>
                        <td>
                            {{ @$payment->item->company->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Country:
                            </strong>
                        </td>
                        <td>
                            {{ @$payment->item->country ?? ''}}
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="table-border" cellpadding="5">
                    <tr>
                        <td>
                            <strong>
                                Invoice No:
                            </strong>
                        </td>
                        <td>
                            {{ $payment->id ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Date:
                            </strong>
                        </td>
                        <td>
                            {{ date('F j Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Customer ID:
                            </strong>
                        </td>
                        <td>
                            {{ $payment->participant ?? @$payment->item->customer->id }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<div class="container">
    <table class="table-border" cellpadding="5">

        <tr>
            <th>Project/Event</th>
            <th>No. of Pax</th>
            <th>Unit Price ({{ $payment->item->currency_code ?? '' }})</th>
            <th>Total Price ({{ $payment->item->currency_code ?? '' }})</th>
        </tr>

        <tr>
            <td>
                {{ $payment->service_name ?? ''}}
            </td>
            @if ($payment->item_type == 'App\SoftwareQuotation')

                <td>
                    {{ number_format($payment->item->licenses) }}
                    {{ ngettext('license', 'licenses', $payment->item->licenses) }}
                </td>

                <td>
                    {{ number_format($payment->unit_price) }}
                </td>

                <td>
                    {{ number_format($payment->item->licenses * $payment->unit_price) }}
                </td>

            @else

                <td>
                    @if( $payment->item->bookingParticipants->count() > 1 and $payment->group_registration == 'Yes')
                        {{ $payment->item->bookingParticipants->count() }} Participants
                    @else
                        {{  number_format( gettype($payment->item->participants) == 'integer' ? $payment->item->participants : $payment->item->participants->count() + 1 ) }}
                        {{ ngettext('participant', 'participants', ( gettype($payment->item->participants) == 'integer' ? $payment->item->participants : $payment->item->participants->count() + 1 )) }}
                    @endif
                </td>

                <td>
                    {{ number_format($payment->unit_price) }}
                </td>

                <td>
                    @if( $payment->item->bookingParticipants->count() > 1 and $payment->group_registration == 'Yes')
                        {{ $payment->item->bookingParticipants->count() * $payment->unit_price }}
                    @else
                        {{ number_format(( gettype($payment->item->participants) == 'integer' ? $payment->item->participants : $payment->item->participants->count() + 1 ) * $payment->unit_price) }}
                    @endif
                </td>

            @endif
        </tr>

        @if ($payment->service == 'Course' or $payment->service == 'Certification' or $payment->service == 'Certification Bundle')

            @foreach ($payment->item->tours as $tour)

                <tr>
                    <td>
                        Recommended Tour: <br>
                        {{ $tour->name }}
                    </td>
                    <td>
                        {{ number_format($tour->pivot->participants) }}
                        {{ ngettext('participant', 'participants', $tour->pivot->participants) }}
                    </td>
                    <td>
                        {{ number_format($tour->pivot->cost) }}
                    </td>
                    <td>
                        {{ number_format($tour->pivot->cost * $tour->pivot->participants) }}
                    </td>
                </tr>

            @endforeach

            @foreach ($payment->item->software as $software)

                <tr>
                    <td>
                        Recommended Software: <br>
                        {{ $software->name }}
                    </td>
                    <td>
                        {{ number_format($software->pivot->licenses) }}
                        {{ ngettext('license', 'licenses', $software->pivot->licenses) }}
                    </td>
                    <td>
                        {{ number_format($software->pivot->cost) }}
                    </td>
                    <td>
                        {{ number_format($payment->item->software_cost) }}
                    </td>
                </tr>

            @endforeach

        @endif

        @foreach ($payment->item->paymentLogs as $payment_log)

            <tr>
                <td>
                    Payment {{ $payment_log->effect }}: <br>
                    {{ ucfirst($payment_log->reason) }}
                </td>
                <td>
                    1 participant
                </td>
                <td>
                    {{ number_format($payment_log->amount) }}
                </td>
                <td>
                    {{ $payment_log->effect == 'increase' ? '' : '(-)' }}
                    {{ number_format($payment_log->amount) }}
                </td>
            </tr>

        @endforeach

        <tr>
            <td colspan="3">
                <strong>SUBTOTAL</strong>
            </td>
            <td>
                @if( $payment->item->bookingParticipants->count() > 1 and $payment->group_registration == 'Yes')
                    {{ number_format($payment->item->subtotal_cost) }}
                @elseif( $payment->item->bookingParticipants->count() > 1 and $payment->group_registration != 'Yes')
                    {{ number_format($payment->item->subtotal_cost / $payment->item->bookingParticipants->count()) }}
                @else
                    {{ number_format($payment->item->subtotal_cost) }}
                @endif
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <strong>TAX</strong>
                ({{ "{$payment->item->tax_percentage}%" }})
            </td>
            <td>
                @if( $payment->item->bookingParticipants->count() > 1 and $payment->group_registration == 'Yes')
                    {{ number_format($payment->item->tax) }}
                @elseif( $payment->item->bookingParticipants->count() > 1 and $payment->group_registration != 'Yes')
                    {{ number_format($payment->item->tax / $payment->item->bookingParticipants->count()) }}
                @else
                    {{ number_format($payment->item->tax) }}
                @endif
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <strong>TOTAL AMOUNT</strong>
            </td>
            <td>
                <strong>
                    @if( $payment->item->bookingParticipants->count() > 1 and $payment->group_registration == 'Yes')
                        {{ number_format($payment->item->total_cost) }}
                    @elseif( $payment->item->bookingParticipants->count() > 1 and $payment->group_registration != 'Yes')
                        {{ number_format($payment->item->total_cost / $payment->item->bookingParticipants->count()) }}
                    @else
                        {{ number_format($payment->item->total_cost) }}
                    @endif
                </strong>
            </td>
        </tr>

    </table>
</div>

@if( $payment->item->bookingParticipants->count() > 1 and $payment->group_registration == 'Yes')
    <h3>Other Participants</h3>
    <ul>
        @foreach($payment->item->bookingParticipants as $participant)
            @if($participant->customer->name == $payment->customer->name)
                @continue
            @else
                <li>{{ $participant->customer->name ?? ''}}</li>
            @endif
        @endforeach
    </ul>
@endif

@if ($payment->service == 'Course' or $payment->service == 'Certification' or $payment->service == 'Certification Bundle')

    <div class="container">
        <table class="table-border" cellpadding="5">
            <tr>
                <th colspan="2">
                    BANKING DETAILS
                </th>
            </tr>
            <tr>
                <td>
                    <strong>
                        Name of Bank
                    </strong>
                </td>
                <td>
                    {{ $payment->item->currency->bank_name ?? $currency->bank_name ?? ''}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        Branch Name
                    </strong>
                </td>
                <td>
                    {{ $payment->item->currency->bank_branch ?? $currency->bank_branch ?? '' }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        Account Name
                    </strong>
                </td>
                <td>
                    {{ $payment->item->currency->account_name ?? $currency->account_name ?? '' }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        Account Number
                    </strong>
                </td>
                <td>
                    {{ $payment->item->currency->bank_account ?? $currency->bank_account ?? '' }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        Swift Code
                    </strong>
                </td>
                <td>
                    {{ $payment->item->currency->swift_code ?? $currency->swift_code ?? '' }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        Bank Code
                    </strong>
                </td>
                <td>
                    {{ $payment->item->currency->bank_code ?? $currency->bank_code ?? '' }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        Branch Code
                    </strong>
                </td>
                <td>
                    {{ $payment->item->currency->branch_code ?? $currency->branch_code ?? '' }}
                </td>
            </tr>
        </table>
        <p>All checks payable to: Indepth Research Institute Ltd.</p>
        <p>Please send proof of payment to: outreach@indepthresearch.org</p>
    </div>

@endif

<div class="clearfix">
    <img class="right" src="{{ public_path('images/ires-letter-head.webp') }}" height="70px" alt="ires-letter-head">
</div>

<div class="container">
    Terms and Conditions:
    <br><br>

    <b>1.DEFINITIONS AND APPLICATION</b>

    <br>
    In these Terms and Conditions “IRES” means Indepth Research Institute Ltd.

    “Client” any person at whose request or on whose behalf IRES undertakes any business or provides advice, information or services.

    If any legislation is compulsorily applicable to any business undertaken, these Terms and Conditions shall, as regards such business, be read as subject to such legislation and nothing in these Terms and Conditions shall be construed as a surrender by IRES of any of its rights or immunities or as an increase of any of its responsibilities or liabilities under such legislation and if any part of these Terms and Conditions be repugnant to such legislation to any extent such part shall as regards such business be overridden to that extent and no further.
    <br><br>

    <b>2.Validity of Offer:</b>

    <br>
    Ninety days (90) from date of issue.
    <br><br>

    <b>3.Pricing:</b>

    <br>
    Training Fee shall be charged at individual or group rates which includes facilitation and cost of workshop materials. Prices are subject to change at any time prior to IRES acceptance of

    Client’s order.
    <br><br>

    <b>4.Order Acceptance</b>

    <br>
    IRES shall accept the client order once the
    training fees have been paid in full.
    <br><br>

    <b>5.Terms of Payment:</b>

    <br>
    The client will make the full payment to the
    following account details: <br>
    {{ $payment->item->currency->account_name ?? $currency->account_name ?? ''}} Account Number:

    {{ $payment->item->currency->bank_account ?? $currency->bank_account ?? ''}} <br>

    {{ $payment->item->currency->bank_name ?? $currency->bank_name ?? ''}}, {{ $payment->item->currency->bank_branch ?? $currency->bank_branch ?? ''}}. <br>

    Branch Code: {{ $payment->item->currency->branch_code ?? $currency->branch_code ?? ''}} <br>

    SWIFT Code: {{ $payment->item->currency->swift_code ?? $currency->swift_code ?? ''}} <br>

    16% VAT is payable until proof of exemption is provided.
    <br><br>

    <b>6.Delivery Time:</b>

    <br>
    Client‐site workshop will have a minimum duration of 5 working days and is subject to availability of an instructor.
    <br><br>

    <b>7.Quorum:</b>

    <br>
    All scheduled courses will be conducted as long as there's a participant that has confirmed.
    <br><br>

    <b>8.Force Majeure:</b>

    <br>
    Neither party will be liable for performance delays, nor for non‐performance due to causes beyond its reasonable control; however, will this provision not apply to Client's payment obligation.
    <br><br>

    <b>9.Confidentiality:</b>

    <br>
    Confidential information includes without limitation, pricing, software and hardware products, product plans, marketing and sales information, business plans, customer and supplier data, financial and technical information, “know‐how," trade secrets, and other information, whether such information is in written, oral, electronic, web‐based, or other form. These may not be divulged to any third party without prior written consent from IRES. The Client shall exercise the same degree of care as that used to protect their own confidential information but no less than reasonable care.
    <br><br>

    <b>10.Jurisdiction and Law:</b>

    <br>
    These Terms and Conditions and any act or contract to which they apply shall be governed by the Laws of Kenya and any dispute arising out of any act or contract to which these Terms and Conditions apply shall be subject to the exclusive jurisdiction of the Courts of Kenya.
    <br><br>

    <b>11.Further Information:</b>

    <br>
    Please contact us in case you need clarification or further information.
    Email: outreach@indepthresearch.org
</div>

<div class="clearfix">
    <img class="right" src="{{ public_path('images/ires-letter-head.webp') }}" height="70px">
</div>

<div class="container">
    <b>Acceptance</b>

    <br><br>

    Company Name: ________________________________________________________________________

    <br><br>

    Quote No___________________________________________________________________________

    <br><br>

    Date ______________________________________________________________________________

    <br><br>

    I hereby accept the terms and conditions of the above-mentioned invoice and place an order with Indepth Research Institute Ltd for the services indicated on the invoice.

    <br><br>

    Name of Authorizing Officer:

    ______________________________________________________________________________________

    <br><br>

    Date: _________________________________________________________________________________

    <br><br>

    Signature: __________________________________________________________________________

    <br><br>

    Official Stamp/Seal:
    <textarea rows="10"></textarea>
</div>

<div class="clearfix">
    <img class="right" src="{{ public_path('images/ires-letter-head.webp') }}" height="70px">
</div>

<style type="text/css">
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    .right {
        float: right
    }
    .text-left {
        text-align: left;
    }
    .text-right {
        text-align: right;
    }
    .text-center {
        text-align: center;
    }
    .container {
        margin-bottom: 40px;
    }
    table {
        width: 100%
    }
    th, td {
        font-size: 14px;
    }
    td {
        vertical-align: top;
    }
    .table-border, .table-border th, .table-border td {
        border: 1px solid #aaa;
        border-collapse: collapse;
    }
</style>
