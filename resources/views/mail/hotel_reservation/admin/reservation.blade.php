@component('mail::message')
# Hotel Reservation

You have a hotel reservation by ** {{ $reservation->customer->name }} **. Below are the details:

#### Reservation
    
<table class="table table-bordered">
    <tr>
        <td>Check In</td>
        <td>{{ date('F j Y', strtotime($reservation->check_in)) }}</td>
    </tr>
    <tr>
        <td>Check Out</td>
        <td>{{ date('F j Y', strtotime($reservation->check_out)) }}</td>
    </tr>
    <tr>
        <td>Flight</td>
        <td>{{ $reservation->flight }}</td>
    </tr>
    <tr>
        <td>No. of Rooms</td>
        <td>{{ $reservation->rooms }}</td>
    </tr>
    <tr>
        <td>Visa</td>
        <td>{{ $reservation->visa }}</td>
    </tr>
    <tr>
        <td>Airport Transfer</td>
        <td>{{ $reservation->airport_transfer }}</td>
    </tr>
</table>

#### Customer Information

<table class="table table-bordered">
    <tr>
        <td>Name</td>
        <td>{{ $reservation->name }}</td>
    </tr>
    <tr>
        <td>E-mail Address</td>
        <td>{{ $reservation->email }}</td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td>{{ $reservation->phone }}</td>
    </tr>
</table>

@component('mail::button', ['url' => route('backoffice.hotel_reservation.show', $reservation) ])
View Reservation Details
@endcomponent

@endcomponent
