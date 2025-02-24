@component('mail::message')
You have a new course registration from {{ $booking->customer->name }}.

@component('mail::button', ['url' => route('backoffice.course.booking.show', compact('booking'))])
View Booking
@endcomponent

@endcomponent
