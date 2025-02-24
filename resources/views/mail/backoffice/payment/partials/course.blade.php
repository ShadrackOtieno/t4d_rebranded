<table>
	<tr>
		<th>Course</th>
		<th>Description</th>
		<th>Unit Price</th>
		<th>Total Price</th>
	</tr>
	<tr>
		<td rowspan="5">{{ $payment->service }}</td>
		<td>1 Participant</td>
		<td>{{ number_format($payment->item->schedule_cost) }}</td>
		<td>{{ number_format($payment->item->schedule_cost) }}</td>
	</tr>
	<tr>
		<td>Additional Participants</td>
		<td>
			{{ number_format($payment->item->participants()->count()) }}
			&times;
			{{ number_format($payment->item->schedule_cost) }}
			}
		</td>
		<td>
			{{ number_format($payment->item->participants()->count() * $payment->item->schedule_cost) }}
		</td>
	</tr>

	@foreach ($payment->item->tours as $tour)
		<tr>
			<td>{{ $tour->name }}</td>
			<td>
				{{ number_format($payment->item->participants()->count()) }}
				&times;
				{{ number_format($payment->item->schedule_cost) }}
				}
			</td>
			<td>
				{{ number_format($payment->item->participants()->count() * $payment->item->schedule_cost) }}
			</td>
		</tr>
	@endforeach
</table>