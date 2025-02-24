@component('mail::message')
Hello {{ $booking->customer->name }}. <br>

Thank you for your application. We are delighted to invite you to a {{ $booking->duration }} days tour of {{ $booking->tour->name }} starting from {{ date('F j Y', strtotime($booking->from)) }} to {{ date('F j Y', strtotime($booking->to)) }} in {{ "{$booking->tour->city}, {$booking->tour->country}" }}. <br>

View complete tour details.
@component('mail::button', ['url' => route('tour.show', $booking->tour_id)])
View Tour
@endcomponent

An {{ config('app.name') }} representative will forward the invoice and any additional details ASAP. <br>

We are looking forward to seeing you.
@endcomponent
