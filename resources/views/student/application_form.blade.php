@extends('layouts.app')

@section('title', 'Internship App')

@section('content')

    <div class="container">

        <a href="/home">Dashboard</a> / <a href="/internshipapply">Internship Application form</a><br> <br>

        <div class="" style="width:60%;">

            @include('includes.errors')


            <form method="POST" action="/internshipapply">

                @csrf
                
                <div class="form-group">


                    <select name="first_location" class="form-control">

                        <option value="">Select a location</option>


                        @foreach ($locations as $location)

                            <option value="{{ $location->id }}" {{ old('first_location') == $location->id ? 'selected' : '' }} >{{ $location->region}} </option>
                        
                        @endforeach

                    </select>

                </div> 

                <div class="form-group">


                    <select name="second_location" class="form-control">

                        <option value="">Select a location</option>


                        @foreach ($locations as $location)

                            <option value="{{ $location->id }}" {{ old('second_location') == $location->id ? 'selected' : '' }} >{{ $location->region}} </option>
                        
                        @endforeach

                    </select>

                </div> 

                {{--  use radio button to switch btwn registration  --}}

                    <div class="alert alert-info text-center">

                        <h5> <span class="glyphicon glyphicon-info-sign"></span>  <strong> You may only choose this option if you are certain about your application to the company </strong> </h5>

                    </div>

                <div class="form-group">

                    <input class="form-control" name="proposed_company" placeholder="Proposed Company">

                </div><br>

                <div class="form-group">

                    <select name="company_location" class="form-control">

                        <option value="">Select a location</option>


                        @foreach ($locations as $location)

                            <option value="{{ $location->id }}" {{ old('company_location') == $location->id ? 'selected' : '' }} >{{ $location->region}} </option>
                        
                        @endforeach

                    </select>

                </div> 

                {{--  or may enter proposer company and the region --}}

                <div>

                    

                </div>


                <button class="btn btn-primary" type=submit>Apply</button>


            </form>

        </div>

    </div>

@endSection
