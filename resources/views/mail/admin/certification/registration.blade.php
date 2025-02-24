@component('mail::message')
You have a new certification registration from {{ $booking->customer->name }}.

@component('mail::button', ['url' => route('backoffice.certification.booking.show', compact('booking'))])
Button Text
@endcomponent

@endcomponent
