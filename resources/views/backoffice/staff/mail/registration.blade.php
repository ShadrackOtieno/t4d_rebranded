@component('mail::message')
# Account Registration

Hello {{ $staff->name }}, <br>
You have been registered as {{ ucfirst($staff->account->role) }} on {{ config('app.name') }}. Below is your login details:

- E-mail Address: {{ $staff->account->email }}
- Password: {{ $password }}

@component('mail::button', ['url' => ''])
Sign In
@endcomponent

@endcomponent
