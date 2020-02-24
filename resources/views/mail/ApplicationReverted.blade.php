@component('mail::message')
# Hello {{ $user->name }}, <br>

<p>
    You are receiving this mail because your application's approval has been reverted. <br>

    You will be notified immediately your application is reapproved.
</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
