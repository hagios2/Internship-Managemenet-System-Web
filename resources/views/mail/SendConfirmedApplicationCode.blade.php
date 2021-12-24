@component('mail::message')

# @if ($ConfirmedToken->company)

    {{ $ConfirmedToken->company->company_name }}

@elseif($ConfirmedToken->application)

    {{ $ConfirmedToken->application->preferred_company_name }}
    
@endif

Dear Sir, <br>

<p>
    We wish to introduce to you by this attached letter our student(s).


    Kindly use <strong>{{ $code }}</strong> as application code when registering into the system
</p>

@component('mail::button', ['url' => '{{config("app.url")}}/supervisor/register'])
Register
@endcomponent

Thanks,<br>
{{ auth()->guard('main_cordinator')->user()->name }} <br>
Industrial Attachment Coordinator
@endcomponent
