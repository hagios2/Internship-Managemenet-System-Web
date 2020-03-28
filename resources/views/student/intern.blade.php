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
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
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


              console.log(company);

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
                    
                  var marker = new google.maps.Marker({position: pos, map: map});

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
              }
            }
         /*    if(google.maps.geometry.poly.containsLocation(e.latLng, bermudaTriangle))
            {

            } */

        });     

          function handleLocationError(browserHasGeolocation, infoWindow, pos) {
              infoWindow.setPosition(pos);
              infoWindow.setContent(browserHasGeolocation ?
                                    'Error: The Geolocation service failed.' :
                                    'Error: Your browser doesn\'t support geolocation.');
              infoWindow.open(map);  

            }         

    
      }

    

</script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" type="text/javascript"></script>
    
@endsection

