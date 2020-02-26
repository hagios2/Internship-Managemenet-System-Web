@component('mail::message')
# Hello {{ $user->name }}

<p>
    
    Your application has been denied. You may consider applying again
    
</p>

@component('mail::button', ['url' => '{{ config("app.url")}}/internshipapply'])
Apply
@endcomponent

Thanks,<br>
{{ auth()->guard('main_cordinator')->user()->name }} <br>
Industrial Attachment Coordinator
@endcomponent
