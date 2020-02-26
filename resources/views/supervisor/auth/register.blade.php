@extends('supervisor.layout.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                @include('includes.errors')

                <span id="flash-code" class="col-md-4" style="display:none;" ></span>

                <div class="card-body">
                    <form method="POST" action="/supervisor/register">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" id="app_id">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Application code') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code">

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>   
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="sub-butt"> 
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')

    <script>

        $(document).ready(function(){

            $('#sub-butt').prop('disabled', true); 

            $('#code').keyup(function(e){

                console.log(e.currentTarget.value);

                if(e.currentTarget.value.length == 5)
                {
                    $.ajax({

                        url: '/supervisor/check-code',
                        dataType: 'json',
                        data: {code: e.currentTarget.value},
                        method: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        }).done(function(data){

                        if(data.code == 'success')
                        {
                            $('#flash-code').text('Code accepted');

                            $('#flash-code').attr('class', 'alert alert-success');

                            $('#flash-code').fadeIn('slow');

                            $('#flash-code').fadeOut(3000);

                            if(data.application_id != null)

                            {   
                                $('#app_id').val(data.application_id);

                                $('#app_id').attr('name', 'application_id');

                            } else if(data.company_id != null){

                                $('#app_id').val(data.company_id);

                                $('#app_id').attr('name', 'company_id');
                            }

                            $('#sub-butt').prop('disabled', false); 

                        }else {

                            $('#flash-code').text('Invalid Code!');

                            $('#flash-code').attr('class', 'alert alert-danger');

                            $('#flash-code').fadeIn('slow');

                            $('#flash-code').fadeOut(3000);

                            $('#sub-butt').prop('disabled', true); 

                        }

                    });

                }
               
            })
        })
    
    </script>
    
@endsection