@component('mail::message')
# Invoice #{{ $payment->id }} Payment

Hello {{ $payment->item->customer->name }}, <br>
We have received your booking details for ** {{ $payment->item->software->name }} **. Below is a generated invoice for payment:

<table>
	<tr>
		<td>
			Software
		</td>
		<td>
			{{ $payment->item->software->name }}
		</td>
	</tr>
	<tr>
		<td>
			Invoice No.
		</td>
		<td>
			{{ $payment->id }}
		</td>
	</tr>
	<tr>
		<td>
			Amount
		</td>
		<td>
			{{ $payment->currency }}
			{{ number_format($payment->amount) }}
		</td>
	</tr>
	<tr>
		<td>
			Date
		</td>
		<td>
			{{ $payment->created_at->format('F j Y') }}
		</td>
	</tr>
	<tr>
		<td>
			Status
		</td>
		<td>
			{{ ucfirst($payment->status) }}
		</td>
	</tr>
</table>

@endcomponent
