@component('mail::message')
# Congrats {{ $application->student->name }}
 

<p>
   Your application has beeen approved
</p>

@component('mail::button', ['url' => '{{config("app.url")}}/start-internship/{{ $application->id }}'])
Register
@endcomponent


Thanks,<br>
{{ auth()->guard('main_cordinator')->user()->name }} <br>
Industrial Attachment Coordinator
@endcomponent
