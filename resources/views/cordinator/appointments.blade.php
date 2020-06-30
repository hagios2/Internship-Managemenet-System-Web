@extends('cordinator.layout.auth')

@section('content')


    <div>
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/cordinator/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Appointment</li>
        </ol>
    </div><!-- /.col -->

    <br><br><br>

    <div class="container">

{{--       {{ dd($appointments)}} --}}

      @if($appointments->isNotEmpty())
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Student</th>
                        <th>Company</th>
                        <th>Status</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($appointments as $appointment)

                        @isset($appointment['company'])

                          @foreach ($appointment['company'] as $Schulede)
                              <tr>
                                <td>{{ $Schulede['name'] }}</td>
                                <td>{{ $Schulede['company'] }}</td>
                                <td>@if($Schulede['appointment_approved'])
                                        <span class="badge badge-success">Approved</span> 
                                    @else 
                                      <span class="badge badge-primary">Pending</span>  

                                    @endif
                                </td>
                                <td>{{ $Schulede['date'] }}</td>
                              </tr>  
                          @endforeach

                        @endisset

                      @isset($appointment['application'])
                        <tr>
                          <td>{{ $appointment['application']['name'] }}</td>
                          <td>{{ $appointment['application']['company'] }}</td>
                          <td>
                            @if($appointment['application']['appointment_approved'])
                                <span class="badge badge-success">Approved</span> 
                            @else 
                              <span class="badge badge-primary">Pending</span>  
                              
                            @endif
                          </td>
                          <td>{{ $appointment['application']['date']}}</td>
                        </tr>  
                      @endisset
                          
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>

      @else

        <div class="jumbotron text-center">
          <h3 class="title">No Appointment Scheduled</h3>
          <p>You may schedule appointment</p>
        </div>

      @endif

     
    </div>   

@stop
