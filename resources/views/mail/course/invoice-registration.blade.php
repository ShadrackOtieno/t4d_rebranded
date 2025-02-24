@component('mail::message')
Hello {{ $payment->customer->name }}. <br>

Thank you for your application. We are delighted to invite you to participate in a {{ $group_booking->course->duration }} days training on {{ $group_booking->course->name }} to be held from {{ date('F j Y', strtotime($group_booking->schedule->from)) }} to {{ date('F j Y', strtotime($group_booking->schedule->to)) }}. <br>

Find an invoice, pre-training form and invitation letter attached. Please fill and resend the pre-training to {{ @$group_booking->schedule->city->venue->email ?? config('mail.admin.address') }}. <br>

View complete course details.
@component('mail::button', ['url' => route('course.show', $group_booking->course)])
View Course
@endcomponent

We are looking forward to seeing you.
@endcomponent
