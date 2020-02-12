@extends('layouts.app')

@section('content')

    <div class="container">

        @if($toggleapp->toggle)
            
            <div class="row">

                <div class="col-md-3">
                    @include('student.profile')
                </div>
                    
                <div class="col-md-8">

                    <div class="card">

                        <div class="card-header">Dashboard</div>

                        <div class="card-body center">

                            @if ($appointment)

                                <a id="view_appointment" class="btn btn-primary">View </a>

                            @endif
                        
                        </div>

                        <div id="appointment_div" style="display:none;">

                            @if ($appointment)

                                {{$appointment->cordinator->name}}

                                <form action="/appointment/{{ $appointment->id}}" method="post">

                                    <button class="btn btn-primary" type="submit">Approve Appointment</button>

                                </form>

                            @endif

                        </div>

                    </div>

                </div>
            
            </div>

        @else

            @include('student.unavailable_page')

        @endif
            
    </div>

@endsection