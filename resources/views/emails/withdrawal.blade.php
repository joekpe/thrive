@component('mail::message')
# Welcome to {{ config('app.name') }}

Hello,

An author just initiated a withdrawal. <br>
Kindly find the details below. <br>

Name: {{ $details['name'] }}<br>
Email: {{ $details['email'] }}<br>
Phone: {{ $details['phone_number'] }}<br>
Amount: {{ $details['amount'] }}<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
