@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/main-cordinator/dashboard">Dashboard</a></li>
            <li class="active">Student Application</li>
        </ol>
    </div>

@stop

@section('content')

    <div class="container">
        
        @include('includes.errors')

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

                <a class="btn btn-default" href="/main-cordinator/student-applications"> << Student Application Page</a>
                <a id="proposed_request" class="btn btn-primary">View Proposed Applications</a>
            </div><br>
    
            <div class="panel">
    
                <div class="panel-heading">Open Letter Application</div>
    
            </div>

            <div id="open_letter"></div>

        </div>

    </div>

@stop
    
@section('js')
    <script> /* console.log('Hi!'); */

        $(document).ready(function(){

            /* open the section with student proposed company on page load */

            proposed_application();

            /* when click on btn for proposed company open section with proposed company */

            $('a#proposed_request').click(function(){ proposed_application(); });

            /* this function retrives data for proposed company application  */

            function proposed_application(){

                $('div#main_studapp').show();
                // $('div#open_letter').css({display: 'block'});
                $('div#main_open_letter').hide();

                $.ajax({    

                    url: '/main-cordinator/proposed-applications', 
                    dataType :'json'

                    }).done(function(data){

                        console.log(data);

                        if(jQuery.isEmptyObject(data))
                        {
                            $('div#studapp').html('<div class="jumbotron text-center" > <h2 class="title">No application(s) recieved!</h2> <small>You may check up later</'+'small></div>');

                        }else{

                            /* setup table headers and no. of appliation  */

                            $('span.myspan1').html('<strong> No. of applications: ' + data.length + '</strong>');

                            $('div#studapp').html('<form style="display:inline;" action="/main-cordinator/approve-all/proposed-application" method="post">@csrf <button class="btn btn-success" id="approve-all">Approve all</button></form> &emsp;<button style="display:inline;" type="submit" class="btn btn-primary" {{ $count > 0 ? "" : "disabled" }} id="view-unapproved" formaction="/main-cordinator/view-unapproved" formmethod="GET">View unapproved</button><br><table class="table table-striped"><thead><th>Student Name</th><th>Proposed Company</th><th>Location</th><th>Region</th></thead><tbody class="app"></tbody></table>');

                                /* iterate tru data and display in the DOM */
                        //  $.map(data, function(data, u){

                            $.each(data, function(i, application){

                                if (application.approved == null || application.approved.approved == 0){

                                    $('tbody.app').append('<tr><td>' + application.student_name + '</td><td>'+ application.preferred_company_name + '</td><td>' + application.preferred_company_location + '</td><td>' + application.preferred_company_city + '</td><td>' +'<span><form style="display:inline;" action="/main-cordinator/approve/' + application.id + '/proposed-application" method="post">@csrf <button class="btn btn-success">Approve</button></form></span><span><form style="display:inline;" action="/main-cordinator/' + application.id + '/deny" method="post">@csrf @method("DELETE")  <button class="btn btn-danger">Deny</button></form></span></div></td></tr>');
                                } else {

                                    $('tbody.app').append('<tr><td>' + application.student_name + '</td><td>'+ application.preferred_company_name + '</td><td>' + application.preferred_company_location + '</td><td>' + application.preferred_company_city + '</td><td>'
                                       + '<span><form style="display:inline;" action="/main-cordinator/revert/' + application.id + '/approval" method="post">@csrf  <button class="btn btn-primary">Revert</button></form></span></td></tr>' );
                                }
                            
                           });

                           $('#view-unapproved').click(function(){

                                $.ajax({    

                                    url: '/main-cordinator/view-unapproved', 
                                    dataType :'json'

                                }).done(function(data){

                                    console.log(data);

                                    if(jQuery.isEmptyObject(data))
                                    {
                                        $('div#studapp').html('<div class="jumbotron text-center" > <h2 class="title">All application(s) approved</h2> <small>You may check up later</'+'small></div>');

                                    }else{

                                        /* setup table headers and no. of appliation  */

                                        $('span.myspan1').html('<strong> No. of applications: ' + data.length + '</strong>');

                                        $('div#studapp').html('<form style="display:inline;" action="/main-cordinator/approve-all/proposed-application" method="post">@csrf <button class="btn btn-success" id="approve-all">Approve all</button></form> &emsp;<button style="display:inline;" type="submit" class="btn btn-primary" {{ $count > 0 ? "" : "disabled" }} id="view-all" formaction="/main-cordinator/view-unapproved" formmethod="GET">View All </button><br><table class="table table-striped"><thead><th>Student Name</th><th>Proposed Company</th><th>Location</th><th>Region</th></thead><tbody class="app"></tbody></table>');

                                        $.each(data, function(i, application){

                                            $('tbody.app').append('<tr><td>' + application.student_name + '</td><td>'+ application.preferred_company_name + '</td><td>' + application.preferred_company_location + '</td><td>' + application.preferred_company_city + '</td><td>' +'<span><form style="display:inline;" action="/main-cordinator/approve/' + application.id + '/proposed-application" method="post">@csrf <button class="btn btn-success">Approve</button></form></span><span><form style="display:inline;" action="/main-cordinator/' + application.id + '/deny" method="post">@csrf @method("DELETE")  <button class="btn btn-danger">Deny</button></form></span></div></td></tr>');

                                        });

                                        $('#view-all').click(function(){

                                            proposed_application();
                                        });

                                    }

                                });

                            });
                       // });  
                        } 

                    });      
            
                }
          

            /* when click on btn for request_open_letter, open section with open letter request  */

            $('a#open_request').click(function(){

                $('div#main_studapp').hide();
                $('div#main_open_letter').css({display: 'block'});
                $('div#main_open_letter').show();

                $.ajax({    

                    url: '/main-cordinator/requests-for-open-letter', 
                    dataType :'json'

                }).done(function(data){

                    console.log(data);

                    if(jQuery.isEmptyObject(data))
                        {
                            $('div#open_letter').html('<div class="jumbotron text-center" > <h2 class="title">No application(s) recieved!</h2> <small>You may check up later</'+'small></div>');

                        }else{


                            $('div#open_letter').html('<table class="table table-striped"><thead><th>Student Name</th><th>Phone</th><th>Program</th><th>Level</th></thead><tbody class="app1"></tbody></table>');

                            $('span.myspan2').html('<strong> No. of applications: ' + data.length + '</strong>');  


                        // $.map(data, function(data, u){

                                $.each(data, function(i, application){

                                    $('tbody.app1').append('<tr> <td>' + application.student_name + '</td><td>'+ application.phone + '</td><td>' + application.program + '</td><td>' + application.level + '</td></tr>');
                                });

                        //  }); 
                        }


                });
            });

        });
                
     </script>

@stop
