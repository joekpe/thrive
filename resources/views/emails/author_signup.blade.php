@component('mail::message')
# Welcome to {{ config('app.name') }}

Hello,

An author just signed up.
Kindly find the details below.

Name: {{ $details['name'] }}<br>
Email: {{ $details['email'] }}<br>
Phone: {{ $details['phone_number'] }}<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
