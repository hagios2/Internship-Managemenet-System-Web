@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

    <a href="main-cordinator/dashboard">Dashboard</a> / <a href="/main-cordinator/company">Company</a> / <a  href="/main-cordinator/company/create">Add Company</a>

@stop

@section('content')


    @include('includes.errors')
  

    <div class="container" style="width:50%;">

        <form method="POST" action="/main-cordinator/company">

            @csrf


            <div class="form-group">

                <input type="text" class="form-control" placeholder="Company" name="company_name" value="{{ old('company_name') }}">

            </div>

            <div class="form-group">

                <input type="text" class="form-control" placeholder="location" name="location" value="{{ old('location') }}">

            </div>


              <div class="form-group">


                <select name="city" required class="form-control">

                    <option>Select a City</option>


                    @foreach ($regions as $region)

                        <option value="{{ $region->id }}" {{ old('city') == $region->id ? 'selected' : '' }} >{{ $region->region}} </option>
                    
                    @endforeach

                </select>

            </div> 
           


            <div class="form-group">

                <input type="text" class="form-control" placeholder="Total slots available" name="total_slots" value="{{ old('total_slots') }}">

            </div>


            <button class="btn btn-primary" style=" border-radius: 15px 50px 30px; padding: 10px;width: 100px;height: 50px;" type="submit">Add</button>

        <form>

    </div><br><br>


    <div>

       

       {{--  <div class="container">

            <div class="row">

                @forelse ($companies as $company)

                    <div class="panel panel-default" style="width:30rem;">

                        <div class="panel-body">

                            <p><a href="/company/{{ $company->id}}">{{ $company->company_name}}</a></p>

                        </div>

                    </div>

                @empty
                        <h4>No Company added</h4>

                @endforelse

            </div>

        </div> --}}

    </div>


@stop
