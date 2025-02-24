@component('mail::message')
# Software Quotation Request

<table>
    <tr>
        <td>Software</td>
        <td>{{ $quotation->software->name }}</td>
    </tr>
    <tr>
        <td>Name</td>
        <td>{{ $quotation->name }}</td>
    </tr>
    <tr>
        <td>E-mail Address</td>
        <td>{{ $quotation->email }}</td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td>{{ $quotation->software->phone }}</td>
    </tr>
</table>.

@component('mail::button', ['url' => route('backoffice.software.quote.index')])
View Software Quotes
@endcomponent

@endcomponent
