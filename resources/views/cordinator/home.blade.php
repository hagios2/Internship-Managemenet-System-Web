@extends('cordinator.layout.auth')

@section('extra-css')

    <link href="{{ asset('packages/core/main.css') }}" rel='stylesheet'/>
    <link href="{{ asset('packages/daygrid/main.css')}}" rel='stylesheet'/>
    <link href="{{ asset('packages/list/main.css') }}" rel='stylesheet'/>
    <link href="{{ asset('packages/timegrid/main.css')}}" rel='stylesheet'/>
    
@endsection

@section('content')


    <div>
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div><!-- /.col -->
    <br><br>

    <div class="container">

        @include('includes.errors')

        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 id="count_appointment">{{ auth()->guard('cordinator')->user()->appointment->count() }}</h3>
  
                  <p>All Appointments</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="/cordinator/view-appointments" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 id="approved-appointment"></h3>
  
                  <p>Approved Appointment</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/cordinator/view-appointments" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ auth()->guard('cordinator')->user()->department->program->sum(function($prog){
                      return $prog->student->count();
                  })}}</h3>
  
                  <p>Departmental Students</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="/cordinator/view/{{auth()->guard('cordinator')->user()->department->id }}/applications" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
         
        </div>


        <br><br>
{{-- 
        <div class="col-md-7 col-lg-7 col-xs-7 col-sm-7">

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
        
        </div><br><br> --}}

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
                               {{--   <button type="button" class="btn btn-primary">Save changes</button>  --}}
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


                {{-- appointment modal --}}

                <div class="modal fade" id="modal-appointment">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Extra Large Modal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
    
            </div>    
 
        </div>
        
    </div>   
    
    {{-- <script type="module" src={{ asset('js/calendar.js') }}></script> --}}
    <script type="text/javascript" src={{ asset('packages/core/main.js')}}></script>
    <script type="text/javascript" src={{ asset('packages/daygrid/main.js') }}></script>
    <script type="text/javascript" src={{ asset('packages/list/main.js')}}></script>
    <script type="text/javascript" src={{ asset('packages/timegrid/main.js') }}></script>

    {{-- fullcalendar --}}

    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>

 
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
                    title          : 'Birthday Party',
                    start          : new Date(y, m, d + 1, 19, 0),
                    end            : new Date(y, m, d + 1, 22, 30),
                    allDay         : false,
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

    <script> /* console.log('Hi!'); */

        $(document).ready(function(){

            $.ajax({

                url: '/cordinator/approved-appointment',
                method: 'GET',
                dataType: 'json',

            }).done(function(data){

                $('#approved-appointment').html(data.noted)
            });

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

                                $('div.accord_div').append('');
                                
                            }); 

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

                    $('div#cal_div').hide();

                    $('div#other_app_div').show();

                }else {

                    $('div#company_div').hide();

                    $('div#other_app_div').hide();

                    $('div#cal_div').hide();

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

                        $('#stulist').append('<a href="javascript:void(0);">Grid</a>');

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

            $('input#cal_date').unbind('change').bind('change',function(){

                var appointment_date = $('input#cal_date').val();

                if(appointment_date !== '')
                {
                    let data = {
                        cordinator_id: {{ auth()->guard('cordinator')->id()}},
                        schedule_date: appointment_date,

                    }
                    data[name] = id

                    $.ajax({

                        url: 'schedule-appointment',
                        dataType: 'json',
                        method: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: data

                    }).done(function(data){

                        console.log(data);

                        $(function() {

                            const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                            });

                            if(data.status == 'success')
                            {
                                toastr.success('Appointment has been scheduled successfully')
                            
                            }else{

                                toastr.info(data.status);
                            }
                        });

                        $('#count_appointment').html(data.counts);

                        $('input#cal_date').val('');
                    }); 
                }

            })

        }

    </script>

@stop
