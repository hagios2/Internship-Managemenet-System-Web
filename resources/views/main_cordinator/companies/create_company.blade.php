@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

<div class="container">
    <ol class="breadcrumb">
        <li><a href="/main-cordinator/dashboard">Dashboard</a></li>
        <li><a href="/main-cordinator/company">Company</a></li>
        <li class="active">Add New Company</li>
    </ol>
</div>

@stop

@section('content')


    @include('includes.errors')

    <br>

    <div>{!! $map['html'] !!}</div><br><br>

    <div class="container" style="width:50%;">

        <form method="POST" action="/main-cordinator/company">

            @csrf


            <div class="form-group">

                <input type="text" class="form-control" placeholder="Company" name="company_name" value="{{ old('company_name') }}">

            </div>

            <div class="form-group">

                <input type="email" class="form-control" placeholder="Enter Company email" name="email" value="{{ old('email') }}">

            </div>

            <div class="form-group">

                <input type="text" class="form-control" placeholder="location" id="companyTextBox" name="location" value="{{ old('location') }}">

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

            <div id="other_div" class="form-group"></div>


            <button class="btn btn-primary type="submit">Add company</button>

        <form>

    </div><br>


@stop

@section('js')


    {!! $map['js'] !!}  

    <script>
        $(document).ready(function(){

            
        })
    </script>

    
@endsection