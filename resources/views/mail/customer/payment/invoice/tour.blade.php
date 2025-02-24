@component('mail::message')
# Invoice #{{ $payment->id }} Payment

Hello {{ $payment->item->customer->name }}, <br>
We have received your booking details for ** {{ $payment->item->tour->name }} **. Below is a generated invoice for payment:

<table>
	<tr>
		<td>
			Tour
		</td>
		<td>
			{{ $payment->item->tour->name }}
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
	<tr>
		<td>
			Bank Name
		</td>
		<td>
			{{ ucfirst($payment->status) }}
		</td>
	</tr>
</table>

@if ($payment->item->tour->booking_end)

@php

	$currency = $payment->item->tour->currencies()->where('code', 'USD')->first();

	$bank_name = $currency->bank_name;
	$bank_branch = $currency->bank_branch;
	$bank_account = $currency->bank_account;

@endphp

<table>
	<tr>
		<td>Bank Name</td>
		<td>{{ $bank_name }}</td>
	</tr>
	<tr>
		<td>Branch</td>
		<td>{{ $bank_branch }}</td>
	</tr>
	<tr>
		<td>Account No.</td>
		<td>{{ $bank_account }}</td>
	</tr>
</table>

@else

Our sales team will get in touch with you.

@endif

@endcomponent
