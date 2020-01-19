@extends('layouts.app')

@section('title', 'Internship App')

@section('content')

    <div class="container">

        <a href="/dashboard">Dashboard</a> | <a href="/internshipapply">Internship Application form</a><br> <br>

        <div class="" style="width:60%;">

            @include('includes.errors')

            <div>

                <form method="POST" action="/internshipapply" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">


                        <select name="company_id" class="form-control">

                            <option value="">Select Company</option>


                            @forelse ($companies as $company)

                                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }} >{{ $company->company_name}} </option>

                            @empty

                                <h3 class="title">Currently Not Available</h3>
                            
                            @endforelse

                        </select>

                        <div>

                            <label for="">Attach resume</label>
                            <input type="file" name="resume" id="">

                        </div>

                    </div> <br<br>

                    <button class="btn btn-primary" type=submit>Apply</button>
                
                </form>

            </div><br>

            {{-- Application with Proposed compnay --}}

            <div>

                <div class="alert alert-info text-center">

                    <h5> <span class="glyphicon glyphicon-info-sign"></span>  <strong> You may only choose this option if you are certain about your application to the company </strong> </h5>

                </div>

                <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">

                    <input class="form-control" name="proposed_company" placeholder="Proposed Company">

                </div><br>


                <div>
                    
                    <input class="form-control" name="proposed_company_location" placeholder="Enter location">
                    
                </div><br>

                <div class="form-group">

                    <select name="company_location" class="form-control">

                        <option value="">Select City</option>


                        @foreach ($locations as $location)

                            <option value="{{ $location->id }}" {{ old('company_location') == $location->id ? 'selected' : '' }} >{{ $location->region}} </option>
                        
                        @endforeach

                    </select>

                </div> 

                <div>

                    <label for="">Attach resume</label>
                    <input type="file" name="resume" id="">

                </div>

                <button class="btn btn-primary" type=submit>Apply</button>

            </form>

        </div>

        
        <div>

            <div class="alert alert-info text-center">

                <h5><span class="glyphicon glyphicon-info-sign"></span><strong>Request an open letter</strong></h5>

                <form action="" method="post">
                    
                    <div class="form-group">

                        <input class="form-control" name="student_name" placeholder="Enter name" type="text">
    
                    </div><br>

                       
                    <div class="form-group">

                        <input type="tel" class="form-control" name="phone" placeholder="Enter phone number">
    
                    </div><br>


                    <div class="form-group">

                        <select name="level" class="form-control">
    
                            <option value="" {{ old('level') == "100"}}>Select your city</option>
    
                            @foreach ($locations as $location)
    
                                <option value="{{ $location->id }}" {{ old('company_location') == $location->id ? 'selected' : '' }} >{{ $location->region}} </option>
                            
                            @endforeach
    
                        </select>
    
                    </div> 

                    <button class="btn btn-primary" type=submit>Apply</button>

                </form>

            </div>


        </div>

    </div>

@endSection
