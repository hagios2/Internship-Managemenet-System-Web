@extends('supervisor.layout.auth')

@section('extra-css')

<style>
  #map {
    width: 100%;
    height: 400px;
    background-color: grey;
  }
 </style>  

@endsection

@section('content')

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{--  <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

    @include('includes.errors')

    <div class="row d-flex justify-content-center">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2"> 
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Approval Request</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">View check in approval request(s) </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                    <div style="margin-left:95%;">
                      <a href="/supervisor/view-interns" data-toggle="modal" data-target="#exampleModalLong">
                        <div style="margin-top:5rem;">
                        <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                        </div>
                      </a>
                    </div>
              </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2"> 
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">View interns</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Click here to view interns</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user-tie fa-2x"></i>
                  </div>

                </div>
                <div style="margin-left:95%;">
                  <a href="/supervisor/view-interns">
                    <div style="margin-top:5rem;">
                      <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Intern's Attendance</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div id="mapin">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

</div>

@endsection
  
@section('extra-js')

  <script>

    $(document).ready(function(){


      $.ajax({

          url:'/supervisor/get-interns/approval-requests',
          dataType: 'json',

          }).done(function(data){

            if(jQuery.isEmptyObject(data))
            {
              let dom = `<div class="jumbotron text-center">
        
                                  <h3 class="title">No request(s) available</h3>

                                  <p> You may check later</p>
                              </div>`;

                $('#mapin').append(dom);


            }else{

              $.each(data, function(i, checkIn){

                let dom  = `<a class="dropdown-item d-flex align-items-center" href="/supervisor/view/`+checkIn.checkin_id+`/check-in/coords">
                              <div class="dropdown-list-image mr-3">
                                  <img class="rounded-circle" style="width:4rem; height:4rem;" src="`+checkIn.avatar+`" alt="">
                                  <div class="status-indicator bg-success"></div>
                              </div>
                              <div class="font-weight-bold">
                                  <div class="text-truncate">Hello Sir! I checked in from <i class="fas fa-location"></i> here at `+checkIn.time+`</div>
                                  <div class="small text-gray-500">`+checkIn.name_student+` · `+checkIn.date+`</div>
                              </div>
                            </a><br>`;

                $('#mapin').append(dom);

              });

            }

          });
    });

  
  </script>
    
@endsection

