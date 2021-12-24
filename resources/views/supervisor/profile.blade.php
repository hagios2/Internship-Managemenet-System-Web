@extends('supervisor.layout.auth')

@section('content')

<div class="container">

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
              <form class="user" action="/supervisor/{{ auth()->guard('supervisor')->id() }}/profile-update" method="POST">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="fname" value="{{ explode(' ',auth()->guard('supervisor')->user()->name, 2)[0] }}" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="sname" id="exampleLastName" placeholder="Last Name" value="{{ explode(' ',auth()->guard('supervisor')->user()->name, 2)[1] }}">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" value="{{ auth()->guard('supervisor')->user()->email }}" placeholder="Email Address">
                </div>
               {{--  <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-user btn-block">Save changes</button>
                <hr>
               
              </form>
              
         
            </div>
          
        </div>
      </div>
{{--     </div> --}}

  </div>
</div>
    
@endsection