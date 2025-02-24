@component('mail::message')
# Invoice #{{ $payment->id }} Payment

Hello {{ $payment->item->customer->name }}, <br>
We have received your registration for <b>{{ $payment->item->course->name }}</b>. Below is a generated invoice for payment of the registered course:

<table>
	<tr>
		<td>
			Course
		</td>
		<td>
			{{ $payment->item->course->name }}
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
