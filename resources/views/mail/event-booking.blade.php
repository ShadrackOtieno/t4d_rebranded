@component('mail::message')
Hello {{ $booking->customer->name }}. <br>

Thank you for your application. We are delighted to invite you to participate  on {{ $booking->event }} event to be held on {{ $booking->dates }}. <br>

Find an invoice attached. <br>

We are looking forward to seeing you.
@endcomponent
