@component('mail::message')
# Welcome to {{ config('app.name') }}

Kindly find your the agreement details below.

Your percentage = {{ $details['author_percentage'] }}%.

Click the button below to agree to the terms.

@component('mail::button', ['url' => $details['app_url'] ])
Agree
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
