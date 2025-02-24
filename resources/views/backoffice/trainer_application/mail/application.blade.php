@component('mail::message')
# Trainer Application

<table>
    <tr>
        <td>Name</td>
        <td>{{ $trainer_application->name }}</td>
    </tr>
    <tr>
        <td>E-mail Address</td>
        <td>{{ $trainer_application->email }}</td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td>{{ $trainer_application->phone }}</td>
    </tr>
    <tr>
        <td>Country</td>
        <td>{{ $trainer_application->country }}</td>
    </tr>
    <tr>
        <td>City</td>
        <td>{{ $trainer_application->city }}</td>
    </tr>
    <tr>
        <td>Specialization</td>
        <td>{{ $trainer_application->specialization }}</td>
    </tr>
</table>

@component('mail::button', ['url' => route('backoffice.trainer_application.index')])
View Applications
@endcomponent

@endcomponent
