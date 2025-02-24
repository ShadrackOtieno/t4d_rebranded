@component('mail::message')
# Certification Payment Settlement

We have received your payment on {{ ucfirst($payment->method) }}. <br>
Below is the payment information:

<table>
	<tr>
		<td>Certification Registered</td>
		<td>{{ $payment->item->certification->name }}</td>
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
