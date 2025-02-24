@component('mail::message')
# Course Payment Settlement

We have received your payment on {{ ucfirst($payment->method) }}. <br>
Below is the payment information:

<table>
	<tr>
		<td>Certification Registered</td>
		<td>{{ $payment->item->courseBundle->name }}</td>
	</tr>
	<tr>
		<td>Amount</td>
		<td>
			{{ $payment->currency }}
			{{ number_format($payment->paypal->amount) }}
		</td>
	</tr>
</table>

@component('mail::button', ['url' => route('course.certification.show', $payment->item->course_bundle_id)])
View Course
@endcomponent

@endcomponent
