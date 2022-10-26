<x-mail::message>
# {{ $user->name }}

This is test messege

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
