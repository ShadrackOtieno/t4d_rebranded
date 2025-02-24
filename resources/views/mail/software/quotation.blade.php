@component('mail::message')
Hello {{ $quotation->customer->name }}. <br>

Thank you for your request for quote for {{ $quotation->software->name }}. <br>

An {{ config('app.name') }} representative will forward the quotation and any additional details ASAP.
@endcomponent
