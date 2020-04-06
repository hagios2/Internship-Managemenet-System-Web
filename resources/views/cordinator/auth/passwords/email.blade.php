@extends('vendor.adminlte.passwords.email')

<!-- Main Content -->
@section('form')

<form action="/cordinator/password/email" method="post">
    {{ csrf_field() }}

    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
        <input type="email" name="email" class="form-control" value="{{ isset($email) ? $email : old('email') }}"
               placeholder="{{ trans('adminlte::adminlte.email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-flat">
        {{ trans('adminlte::adminlte.send_password_reset_link') }}
    </button>
</form>

@endsection
