@component('mail::message')
Hello {{ $booking->customer->name }}. <br>

Thank you for your application. We are pleased to invite you to attend training on {{ $booking->course->name }}, which will be held from <strong>{{ \Carbon\Carbon::parse($booking->schedule->from)->format('F jS Y') }} </strong>
 to <strong>{{ \Carbon\Carbon::parse($booking->schedule->to)->format('F jS Y') }}.</strong> <br> 

Find an invoice, pre-training form and invitation letter attached. Please fill and resend the pre-training to {{ @$booking->schedule->city->venue->email ?? config('mail.admin.address') }}. <br>

View complete course details.
@component('mail::button', ['url' => route('course.show', $booking->course)])
View Course
@endcomponent

We are looking forward to seeing you.
@endcomponent
