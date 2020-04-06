@extends('supervisor.layout.auth')

@section('extra-css')
    <style>
        #map {
            width: 80%;
            height: 400px;
            background-color: grey;
        }
   </style>  
  
@endsection

@section('content')

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="/supervisor/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Approve check-in request</li>
            </ol>
        </nav>

        @include('includes.errors')

        <div class="d-flex justify-content-center">

       {{--  <a href="/supervisor/dashboard" class="btn btn-primary" style="display:block;">Back</a> <br><br> --}}

            <div id="map"></div>

            <form id="approval-form" action="/supervisor/approve/{{ $intern->id }}/check-in" method="post" style="display:none;">
                @csrf

                <input type="hidden" name="approve" value="1">
            </form>


            <form id="deny-form" action="/supervisor/approve/{{ $intern->id }}/check-in" method="post" style="display:none;">
                @csrf
                <input type="hidden" name="approve" value="0">
            </form>

        </div>

    </div>
    
@endsection

@section('extra-js')

<script>

    function initMap()
    {

        $.ajax({

            url: "/supervisor/get/{{ $intern->id }}/check-in/coords",
            dataType: 'json',

        }).done(function(data){


            if(!jQuery.isEmptyObject(data))
            {

                let contentString  =   
                                     `<span class="dropdown-item d-flex align-items-center"><div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" style="width:4rem; height:4rem;" src="`+data.avatar+`" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hello Sir! I checked in from here <i class="fas fa-location"></i> at `+data.time+`</div>
                                        <div class="small text-gray-500">`+data.name_student+` · `+data.date+`</div>
                                    <button id="approve" onclick="event.preventDefault();
                                        document.getElementById('approval-form').submit();" class="btn btn-success">Approve</button>

                                        <button id="approve" onclick="event.preventDefault();
                                        document.getElementById('deny-form').submit();" class="btn btn-danger">Deny</button>

                                    </div></span>`;

                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: parseFloat(data.lat),
                        lng: parseFloat(data.long),
                    },
                    zoom: 14,
                }); 


                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                }); 

                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(data.lat), lng: parseFloat(data.long)},
                    map: map,
                    title: data.name_student,
                    visible: true
                });

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                }); 

            }else{

               
            }

        });

    }
  
  </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" type="text/javascript"></script>
    
@endsection