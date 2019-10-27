@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

    <a href="/main-cordinator/dashboard">Dashboard</a> / <a href="/main-cordinator/company">Company</a> / <a href="/main-cordinator/company/{{ $company->id }}">{{ $company->company_name }}</a> / <a href="/main-cordinator/company/{{ $company->id }}/edit">Edit</a>

@stop

@section('content')


   <div class="container">


    <div>

        @include('includes.errors')

    </div>

    <div  style="width:50%;">

        <form method="POST" action="/main-cordinator/company/{{ $company->id }}">

            @csrf

            @method('PATCH')

            <div class="form-group">

                <input type="text" class="form-control" placeholder="Company" name="company_name" value="{{ $company->company_name }}">

            </div>


            <div class="form-group">


                <select name="location" required class="form-control">

                    <option value="{{ $company->location }}">{{$company->region->region}}</option>

                    <option>Select a location</option>


                    @foreach ($locations as $location)

                        <option value="{{ $location->id }}" {{ old('location') === $location->id ? 'selected' : '' }} >{{ $location->region}} </option>
                    
                    @endforeach

                </select>

            </div> 
           

            <div class="form-group">

                <input type="text" class="form-control" placeholder="Total slots available" name="total_slots" value="{{ $company->total_slots }}">

            </div>


            <button class="btn btn-primary"{{--  style=" border-radius: 15px 50px 30px; padding: 10px;width: 100px;height: 50px;"  --}}type="submit">edit</button>

        </form>

            <span>

                <form method="POST" action="/main-cordinator/company/{{$company->id}}">

                    @csrf
        
                    @method('DELETE')
        
                    <button class="btn btn-danger" type="submit">Delete</button>
        
                </form>

            </span>
    </div>

    </div>

@stop


 