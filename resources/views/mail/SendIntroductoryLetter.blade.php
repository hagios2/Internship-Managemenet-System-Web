@component('mail::message')
# Hello
 

We wish to introduce our student by this mail.
Attached is an introductor letter to help get started with our students

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
Dominic Otoo <br>
{{-- {{ auth()->guard('main_cordinator')->user()->name }} --}}
Industrial Attachment Coordinator
@endcomponent
