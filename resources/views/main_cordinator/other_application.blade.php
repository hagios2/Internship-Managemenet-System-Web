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

            /* open the section with student proposed company on page load */

            proposed_application();

            /* when click on btn for proposed company open section with proposed company */

            $('a#proposed_request').click(function(){ proposed_application(); });

            /* when click on btn for request_open_letter, open section with open letter request  */

            $('a#open_request').click(function(){open_letter_application()});


            /* this function retrives data for proposed company application  */

            function proposed_application(){

                $('div#main_studapp').show();
            // $('div#open_letter').css({display: 'block'});
                $('div#main_open_letter').hide();

                /* get response data object */

                var data = get_applications('/main-cordinator/proposed-applications');

                /* setup table headers and no. of appliation  */

                $('span.myspan1').html('<strong> No. of applications: ' + 8 + '</strong>');

                $('div#studapp').html('<table class="table table-striped"><thead><th>Student Name</th><th>Proposed Company</th><th>Location</th><th>Region</th></thead><tbody class="app"></tbody></table>');

                /* iterate tru data and display in the DOM */
                $.map(data, function(data, u){

                    $.each(data, function(i, application){

                        $('tbody.app').append('<tr><td>' + application.student_name + '</td><td>'+ application.preferred_company_name + '</td><td>' + application.preferred_company_location + '</td><td>' + application.preferred_company_city + '</td></tr>');
                    });
                });   
                    
            }

            /* make actual ajax request here and return data object */
             function get_applications(var uri){

                 return

                $.ajax({    

                    url: uri, 
                    dataType :'json'
                    
                }).done(function(data){
                    
                    return  data;
                
                });

                //return requestData;
                
            }

            /* for open letter application */

            function open_letter_application(){            

                $('div#main_studapp').hide();
                $('div#main_open_letter').css({display: 'block'});
                $('div#main_open_letter').show();

                var data = get_applications('/main-cordinator/requests-for-open-letter');

                $('div#open_letter').html('<table class="table table-striped"><thead><th>Student Name</th><th>Phone</th><th>Program</th><th>Level</th></thead><tbody class="app1"></tbody></table>');

                $('span.myspan2').html('<strong> No. of applications: ' +8 + '</strong>');

                $.map(data, function(data, u){

                    $.each(data, function(i, application){

                        $('tbody.app1').append('<tr><td>' + application.student_name + '</td><td>'+ application.phone + '</td><td>' + application.program + '</td><td>' + application.level + '</td></tr>');
                    });
                }); 

            }
        }); 
       
     </script>)
@stop
