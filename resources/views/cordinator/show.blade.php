@extends('cordinator.layout.auth')

@section('content')

    <div class="container">

        @include('includes.errors')


        @if ($student)

            <div class="row">

              <div class="col-md-6">
    
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="{{ $student->avatar }}"alt="User profile picture">
                    </div>
    
                    <h3 class="profile-username text-center">{{ $student->name}}</h3>
    
                    <p class="text-muted text-center">{{ $student->program->program}}</p>
    
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Application type </b> <a class="float-right">{{ $student->application->default_application ? 'Recommended Application' : 'Proposed Application' }}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Company</b> <a class="float-right"> {{ $student->application->default_application ? $student->application->company->company_name : $student->application->preferred_company_name }}</a>
                      </li>
                      <li class="list-group-item">
                        <b> Location</b> <a class="float-right">{{ $student->application->default_application ? $student->application->company->location : $student->application->preferred_company_location }}</a>
                      </li>
                    </ul>
    
                    <a href="javascript:void(0);" class="muted"><b>Student info</b></a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>

              <div class="col-md-6 col-lg-6">

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModalLong">View Attendance</button>
          
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Student Attendance</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">

                            <section class="content">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-11">
                                    <!-- AREA CHART -->
                                    <div class="card card-dark">
                                      <div class="card-header">
                                        <h3 class="card-title">Attendance Chart</h3>
                        
                                        <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                          </button>
                                          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                        </div>
                                      </div>
                                      <div class="card-body">
                                        <div class="chart">
                                          <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                      </div>
                                      <!-- /.card-body -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </section>            

                          </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                      </div>
                  </div>

                  <button {{ $student->assessment ? '' : 'disabled' }} id="view_assessment" class="btn btn-primary">View Assessment</button> <br><br>


                <div id="assessment" class="col-md-8 col-lg-8 col-xs-8 col-sm-8 " style="display:none">

                  @if ($student->assessment && $student->assessment->filled_assessment_form != null)

                      <div id="first-folder" style="display:inline;">
                          
                          <a id="folder-but" href="javascript:void(0);">

                              <i class="fas fa-angle-right"></i>&nbsp;
                              
                              <i style="font-size:3rem; color:#3C8DBC" class="fa fa-folder" aria-hidden="true"></i>
                              Assessment Folder
                          </a>

                      </div>&emsp;

                      <div class="fa-3x" style="display:inline;">
                          <i style="font-size:2rem;" class="fas fa-spinner fa-spin"></i>
                      </div>

                      <div id="second-folder" style="display:none;"></div> 

                  @elseif($student->assessment && $student->assessment->filled_assessment_form == null)

                          <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                          View Online Assessment
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Online Assessment Form</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <div class="modal-body">
                                  
                                  @include('cordinator.online_form')

                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-primary edit_previous" style="display:none;"><< Previous</button>
                                  <button type="button" class="btn btn-success save">Save</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary edit_next">Next >></button>
                              </div>
                          </div>
                          </div>
                      </div>


                  @else

                      <div class="jumbotron">

                          

                      </div>
                      
                  @endif

              </div>

              </div>


            </div>
            
        @else
            
        @endif
      

    </div>


    <script>

      
      $(document).ready(function(){

            $('.fa-3x').hide();

            $('#view_assessment').click(function(){

                $('#assessment').toggle();

            });

            $('#folder-but').click(function(){

                $('.fa-3x').show();

                setTimeout(function(){

                    $.ajax({

                        url : '/cordinator/{{$student->id}}/assessment/folder',

                        method : 'GET',

                        dataType : 'json'

                    }).done(function(data){

                        if(data)
                        {
                            $('.fa-3x').hide();
                        }                           

                        $('#first-folder').hide();

                        $('#second-folder').html('<a href="javascript:void(0);" id="close_folder"><i class="fas fa-angle-down"></i> &nbsp; <i style="font-size:3rem;" class="fas fa-folder-open"></i> &nbsp; Assessment Folder</a>');

                        let dom = ``;   

                        $.each(data.files, function(i, file){


                            dom += `<div style="margin-left:5rem;">

                                        <a target="\_blank" href="/cordinator/view/{{$student->id}}/`+ file+`"><i style="font-size:3rem;" class="fas fa-file"></i> &nbsp; `+ file + `</a>

                                    </div>`;

                        });

                        $('#second-folder').append(dom);
                            
                        $('#second-folder').show();

                        $('#close_folder').click(function(){

                            $('#first-folder').show();

                            $('#second-folder').hide();

                        });

                    }); 


                }, 2000);


            });


            $('.edit_next').click(function(e){

                e.preventDefault(); 

                $(this).hide();

                $('.edit_previous').show();

                $('#edit_first-form').hide();

                $('#edit_second-form').show();

            });


            $('.edit_previous').click(function(e){

                e.preventDefault(); 

                $(this).hide();

                $('.edit_next').show();

                $('#edit_first-form').show();

                $('#edit_second-form').hide();

            });

            $('.save').click(function(){

                data = {

                    coordinators_interns_technical_abilities : '',
                    coordinators_general_impression_about_intern: '',
                    coordinators_additional_comment:'',
                    companys_activity_relevance :''
                }


                data.coordinators_interns_technical_abilities = $('input[name="coordinators_interns_technical_abilities"]:checked').val();

                data.coordinators_general_impression_about_intern = $('input[name="coordinators_general_impression_about_intern"]:checked').val();

                data.coordinators_additional_comment = $('#coordinators_additional_comment').val();
                data.companys_activity_relevance = $('#companys_activity_relevance').val();

                if(data.companys_activity_relevance != '' || data.coordinators_additional_comment != '' || data.coordinators_general_impression_about_intern != '' || data.coordinators_interns_technical_abilities != '')
                {
                    $('#spina').show();

                    setTimeout(function(){

                        $.ajax({
                            
                            url: "/cordinator/assess/{{ $student->id }}",
                            method: 'POST',
                            data : data,
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            dataType: 'json'

                        }).done(function(data){

                            if(data)
                            {
                                $('#spina').hide();
                            }

                            $('#flash').text('Saved Successfully')

                            $('#flash').fadeIn('fast');

                            setTimeout(function(){

                                $('#flash').fadeOut(3000);

                            }, 3000)

                        });

                    }, 2000)
                }

            });
        });
 
    </script>

    <script>

        $(function () {

      
          // Get context with jQuery - using jQuery's .get() method.
          var areaChartCanvas = $('#lineChart').get(0).getContext('2d')
      
          var areaChartData = {
            labels  : [
                  @foreach($attendance as $checkin)

                      "{{ $checkin['date'] }}",

                  @endforeach
            ],
            datasets: [
              {
                label               : 'Check In',
                pointRadius         : 5,
                pointBorderColor    : "#ffffff",
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [

                                      @foreach($attendance as $checkin)
                                        "{{ $checkin['check_in_time'] }}",
                                      @endforeach
                ]
              },
            {
                label               : 'Check Out',
                pointRadius         : 5,
                borderColor: "#0344a5",
                pointBorderColor: "#ffffff",
                backgroundColor     : '#0344a5',
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [
                @foreach($attendance as $checkin)
                      "{{ $checkin['check_out_time'] }}",
                    @endforeach 
                ]
              }, 
            ]
          }
      
          var areaChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
              display: true
            },
            tooltips:{
                        mode: 'index',
                        intersect: false
                    },

            hover:{
                mode: 'nearest',
                intersect: true
            },
            scales: {
              xAxes: [{
              type: 'time',
                time: {
                unit: 'day'
                }, 

                scaleLabel: {
                    display: true,
                    labelString: 'Sign In Time'
                }, 
                gridLines : {
                  display : true,
                }
              }],
              yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Sign In Date'
                }, 
                gridLines : {
                  display : true,
                }
              }]
            }
          }
      
          // This will get the first returned node in the jQuery collection.
          var areaChart       = new Chart(areaChartCanvas, { 
            type: 'line',
            data: areaChartData, 
            options: areaChartOptions
          })

    })
  </script>

@endsection