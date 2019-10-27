@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')


   @if ($company)

        <a href="dashboard">Dashboard</a> / <a href="company">Company</a> / <a href="company/{{ $company->id }}">{{ $company->company_name }}</a>

   @endif

@stop

@section('content')

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

        <div >

            <table class="table table-striped">

                <tr>

                    <th>
                        Student Name
                    </th>

                    <th>
                        Department
                    </th>

                </tr>
{{--
                @forelse ($students as $student)

                    <tr>

                        <td>{{ $student->name }}</td>

                        <td>{{ $student->department }}</td>

                    </tr>

                @empty

                    <h4 class="alert alert-info"> No student added</h4>

                @endforelse --}}


            </table>

        </div>

    </div>


    <p>

        show student allocated for this company here 

    </p>

    </div>

@stop



