@component('mail::message')
You have a new certification bundle registration from {{ $booking->customer->name }}.

@component('mail::button', ['url' => route('backoffice.certification_bundle.booking.show', compact('booking'))])
Button Text
@endcomponent

@endcomponent
