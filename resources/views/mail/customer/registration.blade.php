@component('mail::message')
# Account Registration

Hello <b>{{ $customer->name }}</b>, <br>
Your account is ready to go. Log in today and start exploring courses, tours and software products. <br>
We have created your login credentials below:

- E-mail: {{ $customer->account->email }}
- Password: {{ $password }}

@component('mail::button', ['url' => route('login')])
Sign In
@endcomponent

Thanks for joining {{ config('app.name') }}.

Cheers,

{{ config('app.name') }} support team
@endcomponent
