@component('mail::message')
# Hello {{ $user->name }}

Your application has been received successfully.
Notice: You can modify your application before the deadline for registration.

If you wish to modify your application kindly click on the link below to 

@component('mail::button', ['url' => ''])
Edit Application
@endcomponent

You may ignore this mail if you have.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
