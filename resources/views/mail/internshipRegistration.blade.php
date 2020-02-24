@component('mail::message')
# Hello {{ $user->name }}

<p>
    Your application has been received successfully.
    Notice: You can modify your application before the deadline for registration.

    If you wish to modify your application kindly click on the link below to 

</p>

@component('mail::button', ['url' => "{{ config('app.url')}}/internshipapply/{$user->application->id}/edit"])
Edit Application
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
