@component('mail::message')
# Congrats {{ $application->student->name }}
 

<p>
   Your application has beeen approved
</p>


Thanks,<br>
Dominic Otoo <br>
{{-- {{ auth()->guard('main_cordinator')->user()->name }} --}}
Industrial Attachment Coordinator
@endcomponent
