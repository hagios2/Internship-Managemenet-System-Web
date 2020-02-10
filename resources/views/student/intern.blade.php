@extends('layouts.app')

@section('content')

<div class="container">

    @if($toggleapp->toggle)
          
                <div class="row">

                    <div class="col-md-3">
                        @include('student.profile')
                    </div>
                
                    {{-- <div > --}}
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Dashboard</div>

                            <div class="card-body center">

                                @if (auth()->user()->application->appointment)

                                    <a id="view_appointment" class="btn btn-primary"></a>

                                @endif
                            
                            </div>

                            <div id="appointment_div">

                                show Lecturer's name and date here


                                @if (auth()->user()->application->appointment)

                                   {{--  <form action="/appointment/{{ auth()->user()->application->appointment->id}}" method="post">
 --}}
                                        <button type="submit">Approve Appointment</button>


                                    </form>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

    @else

        @include('student.unavailable_page')

    @endif
   
@endsection