@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')   
  
@stop

@section('content')

    <div class="container">

        <ol class="breadcrumb" style="width:85%;">
            {{-- <li><a href="/cordinator/">Home</a></li>
            <li><a href="#">Library</a></li> --}}
            <li class="active">Dashboard</li>
        
        </ol> <br><br>

        @include('includes.errors')

        <br>

        <div class="col-md-6 col-lg-6" style="margin: auto;">

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

        </div>
       
        <br><br>

        <div class="col-md-9 col-lg-9">

            
        <div class="panel panel-default" >

            <div class="panel-heading">Student</div>

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-3">

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

                    <div id="programs_div" class="col-md-3" style="display:none;">

                        <form id="prog_form">
                            
                            <div class="form-group">
                                
                                <select class="form-control" name="program" id="selectedProgram"></select>
                        
                            </div>
                        
                        </form>

                    </div>

                </div> <br>

                <div id="student_div" style="display:none;">
                </div>

            </div>

        </div>

        </div>

         <br>

    </div>   
    
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

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
                            $('div#student_div').html('<div class="panel-group" id="accordion"></div>'); 

                            $.each(data, function(i, student){

                                $('div#accordion').append('<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse'+ i +'">'+ student.name + '</a></h4></div><div id="collapse'+ i+'" class="panel-collapse collapse in"><div class="panel-body"><div><span><strong>Company:' + student.company + '</strong></span><span class="pull-right"><strong>Location:' + student.location + '&nbsp;|&nbsp; Region:' + student.region + '</strong></span></div><br><br><canvas id="myChart" width="200" height="200"></canvas> <br><br> <img src="'+ student.avatar+'" style="width:10rem; height:8rem;" alt=""></div></div></div>');
                                
                            }); 

                            @include('cordinator.chart')
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

        });

    
       
     </script>
@stop
