@component('mail::message')
# Certification Payment Settlement

You have received payment from {{ $payment->item->customer->name }}. <br>
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
	<tr>
		<td>Payment Method</td>
		<td>{{ ucfirst($payment->method) }}</td>
	</tr>
</table>

@endcomponent
