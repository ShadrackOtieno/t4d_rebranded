@component('mail::message')
# Customer Request

You have a contact enquiry from a customer. Below is the message details:

<table>
	<tr>
		<td>Name</td>
		<td>{{ ucwords($customer['name']) }}</td>
	</tr>
	<tr>
		<td>E-mail Address</td>
		<td>{{ $customer['email'] }}</td>
	</tr>
	<tr>
		<td>Message</td>
		<td>{{ ucfirst($customer['message']) }}</td>
	</tr>
</table>

@endcomponent
