@component('mail::message')
# Course Payment Settlement

You have received payment from {{ $payment->item->customer->name }}. <br>
Below is the payment information:

<table>
	<tr>
		<td>Course Registered</td>
		<td>{{ $payment->item->course->name }}</td>
	</tr>
	<tr>
		<td>Amount</td>
		<td>
			{{ $payment->currency }}
			{{ number_format($payment->paypal->amount) }}
		</td>
	</tr>
	<tr>
		<td>Payment Method</td>
		<td>{{ ucfirst($payment->method) }}</td>
	</tr>
</table>

@component('mail::button', ['url' => route('backoffice.invoice.course.edit', $payment)])
View Course
@endcomponent

@endcomponent
