@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')

@show

@section('content')

<div class="container">
    <ol class="breadcrumb">
        <li><a href="/main-cordinator/dashboard">Dashboard</a></li>
        <li class="active">Profile</li>
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
            <h1 class="h4 text-gray-900 mb-4">Update Profile Page</h1>
          </div>
            <form class="user" action="/main-cordinator/profile" method="POST">
                @csrf

                @method('PATCH')
                
{{--                 <div class="form-group">
                <input type="text" class="form-control form-control-user" name="password" value="{{ explode(' ',auth()->user()->name, 2)[0] }}" placeholder="Confirm New Password">
                </div>
 --}}

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" required name="firstname" value="{{ explode(' ',auth()->guard('main_cordinator')->user()->name, 3)[0] }}"  placeholder="Enter first name">
                    </div>
                    <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" required name="lastname"  value="{{ explode(' ',auth()->user()->name, 3)[2] }}"placeholder="Enter last name">
                    </div>
                </div>


                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="othername" value="{{ explode(' ',auth()->user()->name, 3)[1] ?? ''}}" placeholder="Other names">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" required name="email" value="{{ auth()->user()->email }}" placeholder="Enter Email">
                    </div>
    
            
                <button type="submit" class="btn btn-primary btn-user btn-block">Save changes</button>
            
                <hr>
           
          </form>
          
     
        </div>

    </div>
    <div class="col-lg-2"></div>
  </div></div>
    
@endsection