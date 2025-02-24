@component('mail::message')
You have a new tour booking from {{ $booking->customer->name }}.

@component('mail::button', ['url' => route('backoffice.tour.booking.show', ['tour' => $booking->tour, 'booking' => $booking])])
Button Text
@endcomponent

@endcomponent
