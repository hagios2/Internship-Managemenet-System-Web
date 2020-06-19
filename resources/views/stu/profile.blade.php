@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      {{--   <li class="breadcrumb-item"><a href="/main-settings">Settings</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
        
    </ol>
  </nav> <br>

  @include('includes.errors')

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0 d-flex justify-content-center">
      <!-- Nested Row within Card Body -->
    {{--   <div class="row"> --}}
  
        <div class="col-lg-8" >
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Your Profile</h1>
            </div>
            <form class="user" action="/{{ auth()->id() }}/profile-update" method="POST">
              @csrf
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" name="fname" value="{{ explode(' ',auth()->user()->name, 2)[0] }}" id="exampleFirstName" placeholder="First Name">
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user" name="sname" id="exampleLastName" placeholder="Last Name" value="{{ explode(' ',auth()->user()->name, 2)[1] }}">
                </div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" value="{{ auth()->user()->email }}" placeholder="Email Address">
              </div>

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" name="fname" value="{{ auth()->user()->phone }}" id="exampleFirstName" placeholder="First Name">
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user" name="sname" id="exampleLastName" placeholder="Last Name" value="{{ auth()->user()->index_no }}">
                </div>
              </div>


              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <select name="program" id="">

                    <option value="{{ auth()->user()->program_id }}">{{ auth()->user()->program->program }}</option>

                    <option value="">Select Program</option>
                  </select>
                </div>
                <div class="col-sm-6">
                  <select name="level" required id="" class="form-control" @error('level') is-invalid @enderror>
    
                    <option value="{{ auth()->user()->level_id }}">{{ auth()->user()->level->level }}</option>

                    <option value="">Select Level</option>

                    @foreach($levels as $level)

                        <option {{ old('level') == $level->id ? 'selected' : '' }} value="{{ $level->id }}">{{ $level->level }}</option>

                    @endforeach
                
                </select>
                </div>
              </div>
       
              <button type="submit" class="btn btn-primary btn-user btn-block">Save changes</button>
              <hr>
             
            </form>
            
       
          </div>
        
      </div>
    </div>

@endsection