@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/main-cordinator/dashboard">Dashboard</a></li>
            <li class="active">Companies</li>
        </ol>
    </div>

@stop

@section('content')

    <div>

     @include('includes.errors') <br>

     <div class="panel panel-default" style="width:45%; margin:auto;">

        <div class="panel-heading text-center"><h4> <span class="fas fa-industry"></span>&emsp;Our companies</h4></div>

    </div><br>

        <a class="btn btn-default pull-left" href="/main-cordinator/dashboard"><< Back</a>

        <a class="btn btn-primary pull-right" href="/main-cordinator/company/create">Add company</a><br><br>

        <table class="table table-striped">

            <tr>

                <th>Region</th>

                <th>Company</th>

                <th>Total Slot</th>

            </tr>

            @if ($companies)

                @forelse ($regions as $region)

                        <tr>

                            @if ($region->company)

                                <td>{{ $region->region}}</td>

                                <td>
                                
                                    @foreach ($region->company as $companies)
                    
                                        <a href="company/{{$companies->id}}">{{ $companies->company_name }} </a> <br><br>
                                    
                                    @endforeach 
                                
                                </td>

                                <td>
                                
                                    @foreach ($region->company as $companies)
                    
                                        {{ $companies->total_slots }}<br><br>
                                    
                                    @endforeach 
                                
                                </td>

                            @endif
                                
                        </tr>

                    @empty

                        <h4 class="alert alert-info"> No Company Added </h4>
        
                    @endforelse

            @else

                <h3>No company added yet!</h3>

            @endif
        
        </table>

    </div>

@stop
