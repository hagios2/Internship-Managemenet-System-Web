@extends('layouts.app')

@section('extra-css')

<style>
  #map {
    width: 100%;
    height: 400px;
    background-color: grey;
  }
 </style>  


<link href="{{ asset('packages/core/main.css') }}" rel='stylesheet'/>
<link href="{{ asset('packages/daygrid/main.css')}}" rel='stylesheet'/>
<link href="{{ asset('packages/list/main.css') }}" rel='stylesheet'/>
<link href="{{ asset('packages/timegrid/main.css')}}" rel='stylesheet'/>


@endsection

@section('content')

    <div class="container">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Intern</li>
        </ol>
      </nav> 

        @if($toggleapp->toggle)

            @include('includes.errors')
            
            <div class="row">
{{-- 
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2"> 
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Intern</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Click here to visit the intern's page</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x"></i>
                      </div>

                    </div>
                    <div style="margin-left:95%;">
                      <a href="/interns">
                        <div style="margin-top:5rem;">
                          <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div> --}}

              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2"> 
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Appointment(s)</div><br>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Click to view Appointments</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x"></i>
                      </div>

                    </div>
                    <div style="margin-left:95%;">
                      <a href="/interns" data-toggle="modal" id='sch-appoint' data-target="#exampleModalLong1">
                        <div style="margin-top:5rem;">
                          <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              {{-- check in --}}
              <div id="check_in" class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2"> 
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Attendance</div> <br>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Click here to check in</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                    <div style="margin-left:95%;">
                      <a href="/interns" data-toggle="modal" data-target="#exampleModalLong">
                        <div style="margin-top:5rem;">
                          <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>     
              
              {{-- check out --}}
              <div id="check_out" class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2"> 
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Attendance</div> <br>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Click here to check out</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-door-open fa-2x text-gray-300"></i>
                      </div>
                    </div>
                    <div style="margin-left:95%;">
                      <a href="/interns" data-toggle="modal" data-target="#exampleModalLong2">
                        <div style="margin-top:5rem;">
                          <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>     

              <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Intern's Attendance</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <div class="alert alert-info text-center">
                       Are you sure you want to check out?
                     </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary check-out" onclick="event.preventDefault();
                      document.getElementById('check_out_form').submit();">Check out</button>
                    </div>
                  </div>
                </div>
              </div>

              <form action="/intern/check-out" id="check_out_form" method="post">
                  @csrf
              </form>
              
              {{-- end check out --}}
              <!-- Attendance Modal -->
              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Intern's Attendance</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div id="map"></div> <br>
                      <div id="flash" class="alert alert-info" style="display:none;"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary check-in" style="display:none;">Check in 
                      </button>&nbsp;
                      <button type="button" class="btn btn-primary sup-check" style="display:none;">Request Approval 
                      </button> <div class="fa-3x" &nbsp; id="spina" style="display:none;"><i style="font-size:2rem;" class="fas fa-spinner fa-spin"></i></div>
                    </div>
                  </div>
                </div>
              </div>

              <!--Appointment  Modal -->
              <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">

                        @if ($appointment)

                          Scheduled Appointment with intern by {{$appointment->cordinator->name}}

                        @else

                          Scheduled Appointment with intern

                        @endif

                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">                      

                        @if ($appointment)

                            <div class="row">

                              <div class="col-md-2"></div>

                              <div class="col-md-8" id="calendar"></div>

                              <div class="col-md-2"></div>

                            </div>

                            <form action="/appointment/{{ $appointment->id}}" method="post">+
                            </form>

                        @else

                            <div class="jumbotron text-center">
                                <h3 class="title">No appointment has been booked with your company</h3>

                                <p>You may check later</p>
                            </div>

                        @endif
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      @if ($appointment)
                        <button type="button" class="btn btn-primary">Save the Date</button>
                      @endif
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

@section('extra-js')


    {{-- <script type="module" src={{ asset('js/calendar.js') }}></script> --}}
    <script type="text/javascript" src={{ asset('packages/core/main.js')}}></script>
    <script type="text/javascript" src={{ asset('packages/daygrid/main.js') }}></script>
    <script type="text/javascript" src={{ asset('packages/list/main.js')}}></script>
    <script type="text/javascript" src={{ asset('packages/timegrid/main.js') }}></script>


    <script>

      document.addEventListener('DOMContentLoaded', function() {

          var date = new Date()
          var d    = date.getDate(),
              m    = date.getMonth(),
              y    = date.getFullYear()
          
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'dayGrid', 'timeGrid', 'list'],
          defaultView: 'dayGridMonth',
          header    : {
              left  : 'prev,next today',
              center: 'title',
              right : 'dayGridMonth,timeGridWeek,timeGridDay'
          },

          events: [
              {
                  title: '',
                  start: '',
                  end : '',
              },

              {
                  title          : 'Appointment',
                  start          : new Date(y, m, d + 1, 19, 0),
                /*   end            : new Date(y, m, d + 1, 22, 30), */
                  allDay         : true,
                  backgroundColor: '#00a65a', //Success (green)
                  borderColor    : '#00a65a' //Success (green)
              },
          ],

          editable  : true,
          droppable : true, // this allows things to be dropped onto the calendar !!!
          drop      : function(info) {
              // is the "remove after drop" checkbox checked?
              if (checkbox.checked) {
              // if so, remove the element from the "Draggable Events" list
              info.draggedEl.parentNode.removeChild(info.draggedEl);
              }
          }
        });

        calendar.render();
      });

    </script>


    <script>

        checkAttendance();

        function checkAttendance()
        {
              $.ajax({

              url: '/check/interns/attendance',
              dataType: 'json' 

              }).done(function(data){

                console.log(data);

                if(data.checked_in == true)
                {

                  $('#check_out').show();
                  $('#check_in').hide();

                }else{

                  $('#check_in').show();
                  $('#check_out').hide();

                } 

              });

        }



      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;

      function initMap() {
        
        $.ajax({

            url: '/get-student/company-coordinates',
            dataType: 'json' 

        }).done(function(data){

            if(data){

              var company = {
        
                center: {lat: parseFloat(data.lat)  , lng: parseFloat(data.long)}
                
              };

              map = new google.maps.Map(document.getElementById('map'), {
                center: company.center,
                zoom: 19
              });

                      // Add the circle for this company to the map.
              var companyCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: company.center,
                radius: 10
              });

              infoWindow = new google.maps.InfoWindow;

              // Try HTML5 geolocation.
             if (navigator.geolocation) 
             {  
                navigator.geolocation.getCurrentPosition(function(position) {
                  
                var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                };

                  console.log(pos); 

                var point = new google.maps.LatLng(pos.lat, pos.lng);

                var geocoder = new google.maps.Geocoder();  

                var bounds = companyCircle.getBounds();

                  geocoder.geocode({ 'latLng': pos }, function() {

                      if(bounds.contains(pos)) {

                        $('.check-in').show();
                        
                        $('.sup-check').hide();
                        
                        console.log('You are in the circle');


                        $('.check-in').click(function(e){

                            console.log('the button was clicked');

                            e.preventDefault();

                            $('#spina').show(); 

                            setTimeout(function(){ 

                              SubmitCheckIn(pos);

                            }, 2000); 

                        });
                                                  
                      }else {

                        $('.sup-check').show();
                        
                        $('.check-in').hide();

                        console.log('You are not the circle');

                        $('.sup-check').click(function(e){

                            console.log('the button was clicked');

                            e.preventDefault();

                            $('#spina').show(); 

                            setTimeout(function(){ 

                              requestSupervisorApproval(pos);

                             }, 2000); 
                        });
                     }

                  });
                   
                  var marker = new google.maps.Marker({position: pos, map: map});
                  /*
                  infoWindow.setPosition(pos);
                    infoWindow.setContent('Location found.');
                    infoWindow.open(map);
                    map.setCenter(pos);
                  }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                  });

                    } else { 
                      // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                    } */

                }); 

              }    
            
            }

        });

      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) 
      {
          infoWindow.setPosition(pos);
          infoWindow.setContent(browserHasGeolocation ?
                                'Error: The Geolocation service failed.' :
                                'Error: Your browser doesn\'t support geolocation.');
          infoWindow.open(map);  

      }       

      
      function SubmitCheckIn(pos)
      {
        $.ajax({
            
            url: '/intern/check-in',
            method: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {latitude: pos.lat, longitude: pos.lng}

        }).done(function(data){

          console.log(data);

          if(data.status == 'success')
          {
              $('#spina').hide();

              $('#flash').text('Check in success');

              $('#flash').fadeIn('fast');

              setTimeout(function(){

                  $('#flash').fadeOut(3000);

                  checkAttendance()

              }, 3000);

          }else if(data.status == 'denied'){
                
              $('#spina').hide();

              $('#flash').text('You\'ve already checked in for the day ');

              $('#flash').fadeIn('fast');

              setTimeout(function(){

                  $('#flash').fadeOut(3000);

                  checkAttendance();

              }, 3000);
          }
 
        });

      }

      function requestSupervisorApproval(pos)
      {
        $.ajax({
            
            url: '/intern/request-supervisor/approval',
            method: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data:  {latitude: pos.lat, longitude: pos.lng}

        }).done(function(data){

          console.log(data);

          if(data.status == 'success')
          {
              $('#spina').hide();

              $('#flash').text('Request sent to supervisor');

              $('#flash').fadeIn('fast');

              setTimeout(function(){

                  $('#flash').fadeOut(3000);

                  checkAttendance()

              }, 3000);

          }else if(data.status == 'denied'){
                
              $('#spina').hide();

              $('#flash').text('Request already sent for the day');

              $('#flash').fadeIn('fast');

              setTimeout(function(){

                  $('#flash').fadeOut(3000);

                  checkAttendance();

              }, 3000);
          }
 
        });

      }

/* 
      function getScheduledAppointment()
      {

          $.ajax({

            url: '/scheduled-appointment'

          }).done(function(data){


            console.log(data);
          })

      } */

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" type="text/javascript"></script>

<script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    
@endsection

