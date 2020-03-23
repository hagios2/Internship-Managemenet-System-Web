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

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            Launch demo modal
                        </button>
                          
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  ...
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                          </div>

                    </div>

                </div>
            
            </div>

        @else

            @include('student.unavailable_page')

        @endif
            
    </div>

@endsection