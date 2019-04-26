@component('mail::message')
# New Contact Message

{{ $subject }}

@component('mail::panel')
  {{ $message }}
@endcomponent

@component('mail::button', ['url' => route('foundationsContact')])
 Reply to this Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

