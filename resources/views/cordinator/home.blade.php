@extends('adminlte::cord_page')

@section('title', 'UENR')

@section('content_header')   

    <div class="container">

        <ol class="breadcrumb">
            {{-- <li><a href="/cordinator/">Home</a></li>
            <li><a href="#">Library</a></li> --}}
            <li class="active">Dashboard</li>
        
        </ol>

    </div>
  
@stop

@section('content')

    <div class="container">

        @include('includes.errors')

        <div class="row" style="margin:auto;">

            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                
                <div style="background-color:#26A498; height:10rem; padding:10px;">
        
                    <h1 style="float:left;"><span class="glyphicon glyphicon-calendar"></span></h1><br><h4 id="count_appointment">&emsp; {{auth()->guard('cordinator')->user()->appointment->count()}} Appointment(s)</h4>
                    
                </div>
            
            </div>
                
            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">

                <div style="background-color:peru; height:10rem; padding:10px;">
            
                    <h1 style="float:left;"><span class="glyphicon glyphicon-calendar"></span></h1><br><h4 id="count_appointment">&emsp; {{auth()->guard('cordinator')->user()->appointment->count()}} Appointment(s)</h4>
                    
                </div>

            </div>

            <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">

                <div style="background-color:tomato; height:10rem; padding:10px;">
            
                    <h1 style="float:left;"><span class="glyphicon glyphicon-calendar"></span></h1><br><h4 id="count_appointment">&emsp; {{auth()->guard('cordinator')->user()->appointment->count()}} Appointment(s)</h4>
                    
                </div>

            </div>

        </div>

        <br><br>

        <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7" style="margin-left:17%; margin-right:17%;">

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        View Calendar
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">

                        <div id="calendar"></div>
                      
                    </div>
                  </div>
                </div>

            </div>
        
        </div><br><br>

        <div class="col-lg-12 col-md-12-col-xs-12 col-sm-12">

            <div class="panel panel-default">

                <div class="panel-heading"><span class="glyphicon glyphicon-calendar"></span> Schedule Appointment</div>
    
                <div class="row">
                    <br>
    
                    <div class="form-group col-md-3 col-lg-3 col-xs-5 col-sm-5">
    
                        <select class="form-control" name="application_type" id="appointment_application_type">
    
                            <option value="">Select Application type</option>
    
                            <option value="company application">Company application</option>
                            
                            <option value="other application">Other application</option>
                        
                        </select>
    
                    </div>
    
                    <div id="company_div" class="form-group col-md-3 col-lg-3 col-xs-5 col-sm-5" style="display:none;">
    
                        <select class="form-control" name="company" id="application_company">
    
                            <option value="">Select Company</option>
    
                            @forelse ($companies as $company)
    
                                <option value="{{$company->id}}">{{$company->company_name}}</option>
                                
                            @empty
    
                                <h5 class="title">No company added</h5>
                                
                            @endforelse
    
                        </select>
    
                    </div>
    
                    <div class="form-group col-md-3 col-lg-3 col-xs-5 col-sm-5" id="other_app_div" style="display:none;">
                        
                        <select class="form-control" name="" id="regional_applications">
                            <option value="">Select City</option>

                            @forelse ($regions as $city)
    
                                <option value="{{$city->id}}">{{$city->region}}</option>
                                
                            @empty
    
                                <h5 class="title">No city added</h5>
                                
                            @endforelse
                        </select>
                       
                    </div>

                    <div id="other_app_stud_div" style="display:none;">

                        <button type="button" id="start_modal" o class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Select Student
                        </button>
                        
                          <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">Student List</h4>
                                </div>
                                <div class="modal-body" id="li_stu_list">
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" id="close_modal" class="btn btn-default" data-dismiss="modal">Close</button>
                                {{--   <button type="button" class="btn btn-primary">Save changes</button> --}}
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
    
    
                    <div class="col-md-3 col-lg-3 col-xs-5 col-sm-5" id="cal_div" style="display:none;">
                        
                        <div class="form-group">

                            <input type="date" class="form-control" id="cal_date">
    
                        </div>
  
                    </div>
                        
                </div>

                <br>

                <div id="no_app" style="display:none;"></div>
    
            </div>    

        </div>

        <div class="col-md-6 col-lg-6" style="margin-left:17%; margin-right:15%;">

            <form>
                <div class="input-group">
                <input type="text" class="form-control " placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
                </div>
            </form> 

        </div><br><br>

            <div>

                <div class="col-md-9 col-lg-9" style="margin-left:8%; margin-right:8%;">
        
                    <div class="panel panel-default">

                        <div class="panel-heading"><span class="fa fa-user-md"></span> Student</div>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-5">

                                    <form id="departmentform">

                                        <div class="form-group">

                                            <select class="form-control" name="department" id="selected_department">
                                                
                                                <option value="">Select department</option>

                                                @foreach ($departments as $department)

                                                    <option {{ old('department') == $department->id ? 'selected' : '' }}  value="{{ $department->id }}"> {{ $department->department}} </option>
                                                    
                                                @endforeach

                                            </select>

                                        </div>
                                        
                                    </form>

                                </div>

                                <div id="programs_div" class="col-md-5" style="display:none;">

                                    <form id="prog_form">
                                        
                                        <div class="form-group">
                                            
                                            <select class="form-control" name="program" id="selectedProgram"></select>
                                    
                                        </div>
                                    
                                    </form>

                                </div>

                            </div> <br>

                            <div id="student_div" style="display:none;"></div>

                        </div>

                    </div>

                </div><br>

            </div>

    </div>   
    
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <link href="{{ asset('packages/core/main.css') }}" rel='stylesheet'/>
    <link href="{{ asset('packages/daygrid/main.css')}}" rel='stylesheet'/>
    <link href="{{ asset('packages/list/main.css') }}" rel='stylesheet'/>
    <link href="{{ asset('packages/timegrid/main.css')}}" rel='stylesheet'/>
    
@stop

@section('js')

    {{-- <script type="module" src={{ asset('js/calendar.js') }}></script> --}}
    <script type="text/javascript" src={{ asset('packages/core/main.js')}}></script>
    <script type="text/javascript" src={{ asset('packages/daygrid/main.js') }}></script>
    <script type="text/javascript" src={{ asset('packages/list/main.js')}}></script>
    <script type="text/javascript" src={{ asset('packages/timegrid/main.js') }}></script>

    {{-- fullcalendar --}}

    <script>

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
  
          var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid', 'timeGrid', 'list'],
            defaultView: 'dayGridMonth'
          });
  
          calendar.render();
        });
  
      </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script> /* console.log('Hi!'); */

        $(document).ready(function(){
            

            $('#selectedProgram').change(function(){
                
                var program = $('select#selectedProgram option:selected').val();

                if(program != '')
                {
                    $.ajax({
                       url: '/students-for/' + program + '/program',
                       method: 'GET',
                       dataType: 'json',

                   }).done(function(data){

                       $('div#student_div').show();

                       if(jQuery.isEmptyObject(data))
                       {
                            $('div#student_div').attr('class', 'jumbotron text-center');

                            $('div#student_div').html('<h2 class="title">No student for this Program has registered</h2><p> You may check other Programs</p>');

                       }else{
                          
                            $('div#student_div').attr('class', '');
                            $('div#student_div').html('<div class="panel-group accord_div" id="accordion"></div>'); 

                            $.each(data, function(i, student){

                                $('div.accord_div').append('<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse'+ i +'">'+ student.name + '</a></h4></div><div id="collapse'+ i+'" class="panel-collapse collapse in"><div class="panel-body"><div><span><strong>Company:' + student.company + '</strong></span><span class="pull-right"><strong>Location:' + student.location + '&nbsp;|&nbsp; Region:' + student.region + '</strong></span></div><br> <br><br> <img src="'+ student.avatar+'" style="width:10rem; height:8rem;" alt=""></div></div></div>');
                                
                            }); 

                            /* @include('cordinator.chart') */
                       }
                      
                    }); 
                
                }else{

                    $('div#student_div').hide();
                }

            });

            $('#selected_department').change(function(){

                var department = $('select#selected_department option:selected').val();

                if(department != '')
                {
                   $.ajax({
                       url: '/department/' + department + '/programs',
                       method: 'GET',
                       dataType: 'json',
                   }).done(function(data){

                       $('div#programs_div').show();

                       $('select#selectedProgram').html('<option value="">Select Program</option>');

                       $.each(data, function(i, program){

                            $('select#selectedProgram').append('<option value=' + program.id + '>' + program.program + '</option>');
                       
                        });
                    });
                
                }else{

                    $('div#programs_div').hide();
                    $('div#student_div').hide();
                }

            });


            $('#appointment_application_type').change(function(){

                var application_type = $('#appointment_application_type').val();

                if(application_type == 'company application')
                {
                    $('div#company_div').show();

                    $('div#other_app_div').hide();

                    $('div#other_app_stud_div').hide();

                    $('div#no_app').hide();

                    $('div#cal_div').hide();

                }else if(application_type === 'other application'){

                    $('div#company_div').hide();

                    $('div#company_div').hide();

                    $('div#cal_div').hide();

                    $('div#other_app_div').show();

                }else {

                    $('div#company_div').hide();

                    $('div#other_app_div').hide();

                }

            });

        });

        $('select#regional_applications').change(function(){

            var region = $('select#regional_applications option:selected').val();

            if(region != '')
            {
                $.ajax({
                    
                    method: 'GET',
                    dataType: 'json',
                    url: '/cordinator/other-application/students',
                    data: {'region_id': region}
                
                }).done(function(data){

                    if(jQuery.isEmptyObject(data))
                    {
                        $('#no_app').show();

                        $('#no_app').attr('class', 'jumbotron text-center');

                        $('#no_app').html('<h2 class="title">There are no entries for this region </h2><p> You may check other Regions</p>');

                        $('#other_app_stud_div').hide(); //hide if off

                    }else{



                        //rom 14 23 heb 10 35

                        $('#no_app').hide();

                        $('#other_app_stud_div').show();

                        $('#li_stu_list').html('<div id="stulist"></div>');

                        $('#stulist').append('<a href="javascript:void(0);">Grid</a>')

                        $.map(data, function(application, i) {

                            var disabledButton = ( application.appointment ) ? 'disabled' :'';

                            $('#stulist').append('<div><span class="pull-right"><strong>Company:' + application.company_name + '</strong><strong>&nbsp;|&nbsp; Location:' + application.company_location + '</strong></span></div><br> <br><br> <img src="'+ application.student_avatar+'" style="width:8rem; alt=""><button type="button" data-dismiss="modal" id="butt_app" value="'+application.id+'" class="btn btn-primary pull-right">Select</button><br><h3 class="title">'+application.student_name+'</h3><hr></div>');

                        });

                        $('button#butt_app').click(function(){

                            var application_id = $('button#butt_app').val();

                            let app_name = "application_id"

                            $('button#start_modal').hide()

                            if(application_id != '')
                            {

                                getDateAndAddSchedule(app_name,application_id);

                                $('button#butt_app').val('');

                            }else{

                                $('div#cal_div').hide();
                            } 

                        });

                    }

                });
                
            }else{

                $('div#other_app_stud_div').hide();
            }

        });

        $('select#application_company').change(function(){

            var company = $('select#application_company option:selected').val();
            let com_id = "company_id"

            if(company != '')
            {

                getDateAndAddSchedule(com_id,company);

                $('select#application_company option:selected').val('');

               
            }else{

                $('div#cal_div').hide();
            }
 
        });

        function getDateAndAddSchedule(name,id)
        {
            $('div#cal_div').show();

            $('input#cal_date').change(function(){

                var appointment_date = $('input#cal_date').val();

                //retrieve the key for the method param

               /*  var requestKey = Object.keys(requests) */
            

                if(appointment_date !== '')
                {
                    let data = {
                        cordinator_id: {{ auth()->guard('cordinator')->id()}},
                        schedule_date: appointment_date,

                    }
                    data[name] = id
/* 
                    console.log('the key is : ' + requestKey ); */

                    $.ajax({

                        url: 'schedule-appointment',
                        dataType: 'json',
                        method: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: data

                    }).done(function(data){

                        $('#count_appointment').html('&emsp; '+ data.counts +' Appointment(s)');

                        $('input#cal_date').val('');
                    }); 

                }

            })

        }

    </script>

@stop
