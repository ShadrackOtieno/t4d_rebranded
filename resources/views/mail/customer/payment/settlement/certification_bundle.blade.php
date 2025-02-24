@component('mail::message')
# Certification Bundle Payment Settlement

We have received your payment on {{ ucfirst($payment->method) }}. <br>
Below is the payment information:

<table>
	<tr>
		<td>Certification Bundle Registered</td>
		<td>{{ $payment->item->certificationBundle->name }}</td>
	</tr>
	<tr>
		<td>Amount</td>
		<td>
			{{ $payment->currency }}
			{{ number_format($payment->paypal->amount) }}
		</td>
	</tr>
</table>

@endcomponent
