@component('mail::message')
# Human Resource Manager
  {{ $application->company->company_name }}

We wish to introduce our student by this mail.
Attached is an introductor letter to help get started with our students

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ auth()->guard('main_cordinator')->user()->name }}
Internship Coordinator.
{{ config('app.name') }}
@endcomponent
