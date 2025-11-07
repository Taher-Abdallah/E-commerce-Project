<x-mail::message>
# Hello {{ $clientName }},

The body of your message.

**our Response :**
{{ $replayMessage }}

<x-mail::button :url="config('app.url')">
Button Text
</x-mail::button>

Thanks,<br>
** {{ config('app.name') }}
{{ config('app.url') }}

</x-mail::message>
