@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')  

<ol class="breadcrumb">
    {{-- <li><a href="/cordinator/">Home</a></li>
    <li><a href="#">Library</a></li> --}}
    <li class="active">Dashboard</li>

</ol>  
  
@stop

@section('content')

    <div class="container">

        @include('includes.errors')

        <br>
        
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

        <br>


        <div class="panel panel-default">

            <div class="panel-heading">Student</div>

            <div class="panel-body">

                <form id="departmentform">

                    <div class="form-group" style="width:25%;">

                        <select class="form-control" name="department" id="selected_department">
                            
                            <option value="">Select department</option>

                            @foreach ($departments as $department)

                                <option {{ old('department') == $department->id ? 'selected' : '' }}  value="{{ $department->id }}"> {{ $department->department}} </option>
                                
                            @endforeach

                        </select>

                    </div>
                    
                </form>

                <div id="programs_div" style="display:none;">

                    <form id="prog_form">
                    </form>

                </div>

                <div id="student_div" style="display:none;"></div>

            </div>
          

        </div>

        <button id="bn">click</button>



        <div class="panel" style="width:20%;">

            <div  class="text-center" style="margin:3rem;">


            <p class="title" id="stu">

                    Student Application

                </p><br>

                <a class="btn btn-primary" href="/">View</a>


            </div>

        </div>

    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> /* console.log('Hi!'); */

        $(document).ready(function(){

            $('#selected_program').change(function(){

                alert('hello world');
            });

            $('#selected_department').change(function(){

                var department = $('select#selected_department').val();

                if(department != '')
                {
                   $.ajax({
                       url: '/department/' + department,
                       method: 'GET',
                       dataType: 'json',
                   }).done(function(data){

                       $('div#programs_div').show();

                       $('form#prog_form').html('<div class="form-group" style="width:25%;"><select class="form-control" name="program" id="selectedProgram"><option value="">Select Program</option></select></div>');

                       $.each(data, function(i, program){

                            $('select#selectedProgram').append('<option value=' + program.id + '>' + program.program + '</option>');
                       
                        });
                    });
                
                }else{

                    $('div#programs_div').hide();
                }

            });

        });
       
     </script>
@stop
