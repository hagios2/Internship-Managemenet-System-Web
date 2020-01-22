@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')


    <a href="/main-cordinator/dashboard">Dashboard</a> / <a href="/main-cordinator/student-applications">Student Application</a>

@stop

@section('content')

    <div class="container">

        <div id="main_studapp">

            <div>
                <span style="margin-right:40%;" class="myspan1"></span>

                <a class="btn btn-default" href="/main-cordinator/student-applications"> << Student Application Page </a>
                <a id="open_request" class="btn btn-primary">View Open Letter Requests</a>
            </div> <br>
    
            <div class="panel">
    
                <div class="panel-heading">Closed Internship Application</div>
    
            </div>

            <div id="studapp"></div>

        </div>

        <div style="display:none" id="main_open_letter">
            
            <div>
                <span style="margin-right:40%;" class="myspan2"></span>

                <a class="btn btn-default" href="/main-cordinator/student-applications"> << Student Application Page </a>
                <a id="proposed_request" class="btn btn-primary">View Proposed Applications</a>
            </div>
    
            <div class="panel">
    
                <div class="panel-heading">Open Letter Application</div>
    
            </div>

            <div id="open_letter"></div>

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

            proposed_application();

            $('a#proposed_request').click(function(){

                $('div#main_studapp').show();
               // $('div#open_letter').css({display: 'block'});
                $('div#main_open_letter').hide();

                proposed_application();
            });

            function proposed_application(){

                $.ajax({    
                    
                    method: 'GET',
                    url: '/main-cordinator/proposed-applications',
                    dataType :'json'
                    
                }).done(function(data){

                    $('span.myspan1').html('<strong> No. of applications: ' + 8 + '</strong>');

                    $('div#studapp').html('<table class="table table-striped"><thead><th>Student Name</th><th>Proposed Company</th><th>Location</th><th>Region</th></thead><tbody class="app"></tbody></table>');


                    $.map(data, function(data, u){

                       $.each(data, function(i, application){

                            $('tbody.app').append('<tr><td>' + application.student_name + '</td><td>'+ application.preferred_company_name + '</td><td>' + application.preferred_company_location + '</td><td>' + application.preferred_company_city + '</td></tr>');
                        });
                    });                

                    });
                }

                /* for open letter application */

                $('a#open_request').click(function(){

                    $('div#main_studapp').hide();
                    $('div#main_open_letter').css({display: 'block'});
                    $('div#main_open_letter').show();

                    $.ajax({
                        
                        url: '/main-cordinator/requests-for-open-letter',
                        dataType: 'json'
                    
                    }).done(function(data){

                        $('div#open_letter').html('<table class="table table-striped"><thead><th>Student Name</th><th>Phone</th><th>Program</th><th>Level</th></thead><tbody class="app1"></tbody></table>');

                        $('span.myspan2').html('<strong> No. of applications: ' +8 + '</strong>');

                        $.map(data, function(data, u){

                            $.each(data, function(i, application){

                                $('tbody.app1').append('<tr><td>' + application.student_name + '</td><td>'+ application.phone + '</td><td>' + application.program + '</td><td>' + application.level + '</td></tr>');
                            });
                        }); 

                    });
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
