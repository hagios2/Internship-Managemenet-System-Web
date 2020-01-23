
@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

    @if($company)

    <a href="/main-cordinator/dashboard">Dashboard</a> / <a href="/main-cordinator/company">Company</a> / <a href="/main-cordinator/company/{{$company->id}}">{{$company->company_name}}</a>

    @endif

@stop

@section('content')

    @include('includes.errors') <br>

    <div style="width:80%;"> 

        <div class="container">

            @if($company)

                <div>

                    <div><h3 class="text-center">{{ $company->company_name }}</h3></div>

                    <div class="row">

                        <span><strong> Region: {{ $company->region->region}} | Total Slot: {{ $company->total_slots}}</strong>

                        <a style="margin-left:35" class="btn btn-info" href="{{$company->id}}/edit">Edit</a>

                        <span style="float:right;">
                            <form action="/main-cordinator/application/{{ $company->id }}/approve" method="post">
                                @csrf
    
                            <button {{$company->approved_application ? 'disabled' : ''}} class="btn btn-success" type="submit">Approve Application</button>
                            </form>
                        </span>
            
                    </div>

                    <table class="table table-striped">

                        <thead>

                            <th>Student Name</th>

                            <th>Index No.</th>

                            <th>Program</th>

                            <th>Level</th>

                        </thead>

                        @foreach($company_applications as $application)

                            <tr>

                                <td>{{$application->student->name}}</td>

                                <td>{{ $application->student->index_no }}</td>

                                <td>{{$application->student->program->program}}</td>

                                <td>{{ $application->student->level->level }}</td>

                                <td><a class="btn btn-danger" href="/main-cordinator/{{$application->id}}/deny">Deny</a></td>

                            </tr>

                        @endforeach


                    </table>
                
                </div>

            @endif

        </div>
    </div>

@stop