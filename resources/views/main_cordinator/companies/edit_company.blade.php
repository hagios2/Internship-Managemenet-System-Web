@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

    <ol class="breadcrumb">
        <li><a href="/main-cordinator/dashboard">Dashboard</a></li>
        <li><a href="/main-cordinator/company">Company</a></li>
        <li><a href="/main-cordinator/company/{{ $company->id }}">{{ $company->company_name }}</a></li>
        <li class="active">Edit</li>
      </ol>

@stop

@section('content')


   <div class="container">

        @include('includes.errors')

        <br>
       

        <div class="col-md-11 col-lg-11">{!! $map['html'] !!}</div><br><br>

    
        <div style="width:50%;">

        
            <form method="POST" action="/main-cordinator/company/{{ $company->id }}">

                @csrf

                @method('PATCH')

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Company" name="company_name" value="{{ $company->company_name }}">

                </div>

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="location" id="companyTextBox"" name="location" value="{{ $company->location }}">

                </div>

                
                <div class="form-group">

                    <input type="email" class="form-control" placeholder="Enter Company email" name="email" value="{{ $company->email }}">

                </div>


                <div class="form-group">


                    <select name="city" required class="form-control">

                        <option value="{{ $company->city }}">{{$company->region->region}}</option>

                        <option>Select a location</option>


                        @foreach ($regions as $city)

                            <option value="{{ $city->id }}" {{ old('city') === $city->id ? 'selected' : '' }} >{{ $city->region}} </option>
                        
                        @endforeach

                    </select>

                </div> 

                <div id="other_div" class="form-grop"></div>
            

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Total slots available" name="total_slots" value="{{ $company->total_slots }}">

                </div>


                <button class="btn btn-primary" type="submit">Update</button>

                <a id="del_btn" onclick="document.getElementById('del_form').submit()" class="btn btn-danger">Delete</a>

            </form>

                <span>

                    <form id="del_form" method="POST" action="/main-cordinator/company/{{$company->id}}">

                        @csrf
            
                        @method('DELETE')
            {{-- 
                        <button class="btn btn-danger" type="submit">Delete</button> --}}
            
                    </form>

                </span>
        </div>

    </div>

  

@stop


@section('js')

    {!! $map['js'] !!}
    
@endsection

 