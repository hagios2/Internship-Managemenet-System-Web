@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      {{--   <li class="breadcrumb-item"><a href="/main-settings">Settings</a></li> --}}
        <li class="breadcrumb-item active" aria-current="page">Settings</li>
        
    </ol>
  </nav>

  @include('includes.errors')

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0 d-flex justify-content-center">
      <!-- Nested Row within Card Body -->
    {{--   <div class="row"> --}}
  
        <div class="col-lg-8" >
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
            </div>
            <form class="user" action="/change-password" method="POST">
              @csrf
              @method('PATCH')
        
              <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password" placeholder="Enter Old Password">
              </div>

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" required class="form-control form-control-user" name="new_password" placeholder="Enter New Password">
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" name="new_password_confirmation" id="exampleLastName" placeholder="Confirm new password" >
                </div>
              </div>
       
              <button type="submit" class="btn btn-primary btn-user btn-block">Save changes</button>
              <hr>
             
            </form>
            
       
          </div>
        
      </div>
    </div>

@endsection