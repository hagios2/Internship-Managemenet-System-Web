@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

        <a href="dashboard">Dashboard</a> / <a href="company">Companies</a>

@stop

@section('content')

    <div>

     @include('includes.errors') <br>

     <div class="panel panel-default">

            <div class="panel-heading"><h3> <span class="fas fa-industry"></span>   Our companies</h3></div>

        </div><br>

        <a style="margin-left:85%;" class="btn btn-primary" href="company/create">Add company</a><br><br>

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
