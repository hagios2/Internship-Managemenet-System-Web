@component('mail::message')
# Hello {{ $user->name }}, <br>

<p>
    You are receiving this mail because your application's approval has been reverted. <br>

    You will be notified immediately your application is reapproved.
</p>

Thanks,<br>
{{ auth()->guard('main_cordinator')->user()->name }} <br>
Industrial Attachment Coordinator
@endcomponent
