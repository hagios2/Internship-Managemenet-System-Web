@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')


    <a href="/main-cordinator/dashboard">Dashboard</a> / <a href="/main-cordinator/student-applications">Student Application</a>

@stop

@section('content')

    <div class="container">

        <div>
            <a id="open_request" class="btn btn-primary">Open Letter Requests</a>
        </div>

        <div class="panel">

            <div class="panel-heading">Closed Internship Application</div>
        </div>
            <div id="studapp"></div>





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

                    $('#studapp').html('<table class="table table-striped"><thead><th>Student Name</th><th>Proposed Company</th><th>Location</th><th>Region</th></thead><tbody class="app"></tbody></table>');

                    $.map(data, function(data, u){

                        $.each(data, function(i, application){

                            $('tbody.app').append('<tr><td>' + application.student_name + '</td><td>'+ application.preferred_company_name + '</td><td>' + application.preferred_company_location + '</td><td>' + application.preferred_company_city + '</td></tr>');
                        });
                    });                

                });

                /* for open letter application */

                $('a#open_request').click(function(){

                    $('div#studapp').hide();

                    $.ajax({
                        
                        url: '/main-cordinator/request'
                    })
                })

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
