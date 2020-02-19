@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('includes.errors')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/register">
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
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="email" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="email">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="index_no" class="col-md-4 col-form-label text-md-right">{{ __('Index Number') }}</label>

                            <div class="col-md-6">
                                <input id="index_no" type="text" class="form-control @error('index_no') is-invalid @enderror" name="index_no" value="{{ old('index_no') }}" required autocomplete="index_no">

                                @error('index_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- select a program -->
                        <div class="form-group row">
                            <label for="Program" class="col-md-4 col-form-label text-md-right">{{ __('Program') }}</label>

                            <div class="col-md-6">

                            <select name="program" required id="" class="form-control" @error('program') is-invalid @enderror>

                                <option value="">Select Program</option>

                                @foreach($programs as $student_programs)

                                    <option {{ old('program') == $student_programs->id ? 'selected' : '' }} value="{{ $student_programs->id }}">{{ $student_programs->program }}</option>

                                @endforeach
                            
                            </select>

                                @error('program')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- end program select tag --}}

                            <!-- select a level -->
                            <div class="form-group row">
                                <label for="Program" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>
    
                                <div class="col-md-6">
    
                                <select name="level" required id="" class="form-control" @error('level') is-invalid @enderror>
    
                                    <option value="">Select Level</option>
    
                                    @foreach($levels as $level)
    
                                        <option {{ old('level') == $level->id ? 'selected' : '' }} value="{{ $level->id }}">{{ $level->level }}</option>
    
                                    @endforeach
                                
                                </select>
    
                                    @error('level')
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
                                <button type="submit" class="btn btn-primary">
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
