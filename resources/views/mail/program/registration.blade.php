@component('mail::message')
Hello {{ $booking->customer->name }}. <br>

Thank you for your application. We are delighted to invite you to participate in a {{$booking->program->name ?? ''}} {{ $booking->program->duration ?? ''}} Week(s), 4-6 hours per day program.

We are looking forward to seeing you.
@endcomponent
