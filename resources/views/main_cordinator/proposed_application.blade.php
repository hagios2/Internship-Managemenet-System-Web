@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')


    <a href="/main-cordinator/dashboard">Dashboard</a> / <a href="/main-cordinator/student-applications">Student Application</a>

@stop

@section('content')

    <div class="container">

            <div id="studapp">

                <table class="table">

                    <thead>
                        <th>Student Name</th>
                        <th>Proposed Company</th>
                        <th>Location</th>
                        <th>Region</th>
                    </thead>

                </table>

            </div>


    </div>

{{-- 
    <a id="ki" class="btn btn-primary">click me</a>
    <div class="me" style="width:80%;"> 

        i am here

    </div>

    <div class="ti" style="display:none;">
        you just displayed me up
    </div>

    <form id="local">

        <input type="text" name="" id="dan1">
        <input type="text" name="" id="dan2">
        <input type="text" name="" id="dan3">

        <button>submit</button>

    </form>
 --}}
    

@stop



@section('js')
    <script> /* console.log('Hi!'); */

        $(document).ready(function(){

            $.ajax({
                
                method: 'GET',
                url: '/main-cordinator/proposed-applications',
                dataType :'json'
                
                }).done(function(data){

                    $('#studapp').html('<table class="table"><thead><th>Student name</th><th>Proposed Company</th><th>City</th></thead><tbody>');

                    $.map(data, function(data, i){

                        $('#studapp').append('<tr><td>' + data[0].student_id + '</td><td>' + data[0].preferred_company_name + '</td><td>' + data[0].preferred_company_location + '</td></tr>');

                    });

                 //   $('#studapp').append('</tbody></table>');

            });

            /*
            $('#ki').click(function(){

                $('div.me').toggle();
            }); 
            $('#dan1').keyup(function(e){

                console.log(e.target.value);
            });


            $('#local').submit(function(e){
               e.preventDefault();
               alert('Event prevented') 

                var name = $('#dan1').val();

                var name1 = $('#dan2').val();

                var name2 = $('#dan3').val();

            var name3 = $('#dan4').val(); 
                
                if(name == 'Emmanuel')
                {
                    $('.ti').css({display: 'block', color: 'blue'});

                 $('.ti').html('<p>The first guy is called ' + name + '</p> <br><h4> Hello ' + name1 + '!</h4><div>' + name2 + ' is an amazing place  </div>'); 
                }
                
            }); 

            $('#dan2').keyup(function(e){

                var code = e.which;

                if(code == 13)
                {
                    e.preventDefault();

                    $('#local').after('<h3>' + e.target.value + '</h3>');
                }
            });

            
            */

        
        }); 
       
     </script>)
@stop
