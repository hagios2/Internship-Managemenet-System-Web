@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')

@show

@section('content')

<div class="container">
    <ol class="breadcrumb">
        <li><a href="/main-cordinator/dashboard">Dashboard</a></li>
        <li class="active">Change-Password</li>
    </ol>
</div>

@include('includes.errors')

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0 d-flex justify-content-center">
    <!-- Nested Row within Card Body -->
  {{--   <div class="row"> --}}

    <div class="col-lg-2"></div>
    <div class="col-lg-8" >
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Change Passsword Form</h1>
          </div>
            <form class="user" action="/main-cordinator/change-password" method="POST">
                @csrf
                
                <div class="form-group">
                <input type="password" class="form-control form-control-user" required name="password" placeholder="Confirm New Password">
                </div>


                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" required name="new_password"   placeholder="New Password">
                    </div>
                    <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" required name="new_password_confirmation"  placeholder="Confirm Password">
                    </div>
                </div>

            
                <button type="submit" class="btn btn-primary btn-user btn-block">Save changes</button>
            
                <hr>
           
          </form>
          
     
        </div>

    </div>
    <div class="col-lg-2"></div>
  </div></div>
    
@endsection