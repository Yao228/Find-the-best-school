@component('mail::message')
# Vous avez reçu un nouveau message

Nom : {{$name}}

Email : {{$email}}

Sujet : {{$subject}}

@component('mail::panel')
{{$msg}}
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
