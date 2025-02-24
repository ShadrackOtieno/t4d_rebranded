@component('mail::message')
# Course Payment Settlement

We have received your payment on {{ ucfirst($payment->method) }}. <br>
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
</table>

@component('mail::button', ['url' => route('customer.account.course.show', $payment->item)])
View Course
@endcomponent

@endcomponent
