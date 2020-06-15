@extends('cordinator.layout.auth')

@section('title', 'UENR')

@section('content_header')   

    <div class="container">

        <ol class="breadcrumb">
            {{-- 
            <li><a href="#">Library</a></li> --}}
            <li><a href="/cordinator/dashboard">Dashboard</a></li>
            <li><a href="/cordinator/view/{{ auth()->guard('cordinator')->user()->department->id}}/applications">View Applications</a></li>
            <li class="active">Student Application</li>

        
        </ol>

    </div>
  
@stop

@section('content')

    <div class="container">

        @include('includes.errors')


        @if ($student)

            <div>
                
                <strong>

                    <span>Application type : {{ $student->application->default_application ? 'Recommended Appliction' : 'Proposed Application' }}</span> | 
                    
                    <span>

                        Company : {{ $student->application->default_application ? $student->application->company->company_name : $student->application->preferred_company_name }}
                        
                    </span> |
                     
                    <span>

                        Location : {{ $student->application->default_application ? $student->application->company->location : $student->application->preferred_company_location }}
                        
                    </span> 

                </strong>

                <div class="pull-right">

                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModalLong">View Attendance</button>
                
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Student Attendance</h5>
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

                    <button {{ $student->assessment ? '' : 'disabled' }} id="view_assessment" class="btn btn-primary">View Assessment</button> 


                </div>

                
               
            </div> <br> <br>

            <div class="row">

                <div id="main_page">

                    <div class="col-sm-6 col-md-4">
                    
                        <img src="{{ $student->avatar }}"  class="img-circle" style="width:15rem; height:14rem; margin-left:35%;" alt="...">
                        
                        <h3 class="text-center">{{ $student->name}}</h3>
            
                    </div>
                      
                    
                </div>

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
            
        @else
            
        @endif
      

    </div>

@endsection

@section('js')

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

                        console.log(data)

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

                /* e.preventDefault(); */

                $(this).hide();

                $('.edit_previous').show();

                $('#edit_first-form').hide();

                $('#edit_second-form').show();

            });


            $('.edit_previous').click(function(e){

            /*     e.preventDefault(); */

                
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

@endsection

