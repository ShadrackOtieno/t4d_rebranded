<title>Invoice Attachment</title>

<div class="clearfix">
    <img class="right" src="{{ public_path('images/ires-letter-head.webp') }}" height="70px">
</div>

<table>
    <tr>
        <td class="text-left">
            COMPANY REGISTRATION NO: CPR/2010/28649
        </td>
        <td class="text-right">
            TAX PIN: P051340233L
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
                            {{ $booking->customer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Organization:
                            </strong>
                        </td>
                        <td>
                            {{ $booking->customer->company->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Country:
                            </strong>
                        </td>
                        <td>
                            {{ $booking->customer->country ?? '' }}
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
                            IRES-{{ $booking->id ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Date:
                            </strong>
                        </td>
                        <td>
                            {{ $booking->created_at ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Customer ID:
                            </strong>
                        </td>
                        <td>
                            {{ $booking->customer->id ?? '' }}
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
            <th>Event</th>
            <th>No. of Pax</th>
            <th>Unit Price ({{ $booking->currency_fee ?? '' }})</th>
            <th>Total Price ({{ $booking->currency_fee ?? '' }})</th>
        </tr>

        <tr>
            <td>
                {{ $booking->event ?? '' }}
            </td>

            <td>
                1
            </td>

            <td>
                {{$booking->$fee ?? '' }}
            </td>

            <td>
                {{$booking->$fee ?? '' }}
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <strong>SUBTOTAL</strong>
            </td>
            <td>
                {{$booking->$fee ?? '' }}
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <strong>TAX</strong>
                (0%)
            </td>
            <td>
                0
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <strong>TOTAL AMOUNT</strong>
            </td>
            <td>
                {{$booking->$fee ?? '' }}
            </td>
        </tr>

    </table>
</div>
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
                {{ $bank->bank_name ?? '' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Branch Name
                </strong>
            </td>
            <td>
                {{ $bank->bank_branch ?? '' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Account Name
                </strong>
            </td>
            <td>
                {{ $bank->account_name ?? '' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Account Number
                </strong>
            </td>
            <td>
                {{ $bank->bank_account ?? '' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Swift Code
                </strong>
            </td>
            <td>
                {{ $bank->swift_code ?? '' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Bank Code
                </strong>
            </td>
            <td>
                {{ $bank->bank_code ?? '' }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    Branch Code
                </strong>
            </td>
            <td>
                {{ $bank->branch_code ?? '' }}
            </td>
        </tr>
    </table>
    <p>All checks payable to: Indepth Research Institute Ltd.</p>
    <p>Please send proof of payment to: outreach@indepthresearch.org</p>
</div>

<div class="clearfix">
    <img class="right" src="{{ public_path('images/ires-letter-head.webp') }}" height="70px">
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
    {{ $bank->account_name ?? '' }} Account Number:

    {{ $bank->bank_account ?? '' }} <br>

    {{ $bank->bank_name ?? '' }},  {{ $bank->bank_branch ?? '' }} . <br>

    Branch Code: {{ $bank->branch_code ?? '' }} <br>

    SWIFT Code: {{ $bank->swift_code ?? '' }} <br>

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
