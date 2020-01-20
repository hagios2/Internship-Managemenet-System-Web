@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

   @if ($company)

        <a href="/main-cordinator/dashboard">Dashboard</a> / <a href="/main-cordinator/company">Company</a> / <a href="/main-cordinator/company/{{ $company->id }}">{{ $company->company_name }}</a>

   @endif

@stop

@section('content')

    <div style="width:80%;"> 

        <div class="container">

            @if ($company)

                <div>

                    <h3 class="text-center">{{$company->company_name}}</h3>

                    <div class="row">

                        <span><strong> Region: {{ $company->region->region}} | Total Slot: {{ $company->total_slots}}</strong>

                        <a style="margin-left:60%;" class="btn btn-info" href="{{ $company->id }}/edit">Edit</a>
                    
                    </div>
                
                </div>

            @endif

        </div>

        <div class="panel panel-default">

            <div class="panel-heading"></div>

            <div>
             
                @if ($company_applications)

                <table class="table table-striped">

                    <thead>

                        <th>
                            Student Name
                        </th>

                        <th>
                            Index No.
                        </th>

                        <th>
                            Program
                        </th>

                        <th>
                            Level
                        </th>

                    </thead>

                    @forelse ($company_applications as $application)

                        <tr>

                            <td>{{ $application->student->name }}</td>

                            <td>{{ $application->student->index_no }}</td>

                            <td>{{ $application->student->program->program }}</td>

                            <td>{{ $application->student->level->level }}</td>

                        </tr>

                    @endforelse


                </table>
            @else

                <h4 class="alert alert-info"> No student added</h4>

            @endif

            
            </div>

        </div>

    </div>

@stop



