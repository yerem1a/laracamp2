@component('mail::message')
# Register Camp: {{ $checkout->Camp->title }}

Hi {{ $checkout->User->name }}
<br>
Thank you for registeron <b>{{ $checkout->Camp->title }}</b>. please see payment instructions for more information

@component('mail::button', ['url' => route('dashboard') ])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
