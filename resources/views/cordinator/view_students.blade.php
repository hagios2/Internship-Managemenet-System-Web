@extends('cordinator.layout.auth')

@section('content')

    <div>
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/cordinator/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Student Applications</li>
        </ol>
    </div> <br><br>


    <div class="container">

        @include('includes.errors')

        <div class="row">

            <div class="form-group col-md-5 col-lg-5 col-xs-7 col-sm-7">

                <form id="select_form" action="/cordinator/program/applications" method="get">


                    <select name="program" id="program" class="form-control">

                        <option value="">Select Program</option>

                        @foreach (auth()->guard('cordinator')->user()->department->program as $program)

                            <option {{$program->id == $new_program->id ? 'selected' : ''}} value="{{$program->id}}">{{ $program->program }}</option>

                        @endforeach

                    </select>
                </form>

            </div>

        </div>

        @if ($program_application)

            <div>

                <table class="table table-striped">

                    <thead>

                        <th>Student Name</th>

                        <th>Index No.</th>

                        <th>Company</th>

                        <th>Location</th>

                        <th>Application Type</th>

                    </thead>

                    <tbody>


                    @foreach ($program_application as $application)

                        <tr>
                            <td>{{ $application->student->name }}</td>
                            <td>{{ $application->student->index_no }}</td>

                            @if ($application->default_application)

                                <td>{{ $application->company->company_name }}</td>
                                <td>{{ $application->company->location }}</td>
                                <td>Recommended Application</td>

                            @elseif($application->preferred_company)

                                <td>{{ $application->preferred_company_name }}</td>
                                <td>{{ $application->preferred_company_location }}</td>
                                <td>Proposed Application</td>

                            @endif

                            <td><a class="btn btn-primary" href="/cordinator/view/{{$application->student->id }}/application">View</a></td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center">

                <h3>No application recieved</h3>

                <p>You may check other courses for your department</p>

            </div>

        @endif



    </div>


{{--
@endsection

@section('js') --}}

{{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}

{{--     <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>  --}}

    <script>

        $(document).ready(function(){

            $('#program').change(function(){

                if($('#program option:selected').val() != '')
                {
                    $('#select_form').submit();
                }


            });

        });

    </script>

@endsection

