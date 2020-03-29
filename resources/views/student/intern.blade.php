@extends('layouts.app')

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

        @if($toggleapp->toggle)
            
            <div class="row">

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
              </div>


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
                      <a href="/interns" data-toggle="modal" data-target="#exampleModalLong1">
                        <div style="margin-top:5rem;">
                          <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-xl-3 col-md-6 mb-4">
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
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>


              <!--Appointment  Modal -->
              <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Scheduled Meeting with intern</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                        @if ($appointment)

                            {{$appointment->cordinator->name}}

                            <form action="/appointment/{{ $appointment->id}}" method="post">

                            </form>

                        @else

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

    <script>


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
                zoom: 15
              });

                      // Add the circle for this city to the map.
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
             if (navigator.geolocation) {
                
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
                        console.log('You are in the circle');
                      }else {
                        console.log('You are not the circle');
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

          function handleLocationError(browserHasGeolocation, infoWindow, pos) {
              infoWindow.setPosition(pos);
              infoWindow.setContent(browserHasGeolocation ?
                                    'Error: The Geolocation service failed.' :
                                    'Error: Your browser doesn\'t support geolocation.');
              infoWindow.open(map);  

            }         

    
      

    

</script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" type="text/javascript"></script>
    
@endsection

