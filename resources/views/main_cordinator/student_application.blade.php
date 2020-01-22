@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')


    <a href="/main-cordinator/dashboard">Dashboard</a> / <a href="/main-cordinator/student-applications">Student Application</a>

@stop

@section('content')

    <div style="width:80%;"> 


        <div class="row">

            <div class="panel" style="width:20%;">
    
                <div class="text-center" style="margin:3rem;"> 
    
                <p class="title">
    
                        Recommeded Application
    
                    </p><br>
    
                    <a class="btn btn-primary" href="/main-cordinator/default-applications">View</a>
    
                </div>
    
            </div>
    
            <div class="panel" style="width:20%;">
    
              <div class="text-center" style="margin:3rem;">
    
    
              <p class="title">
    
                      Other Applications
    
                  </p><br>
    
                  <a class="btn btn-primary" id="propose" href="/main-cordinator/other-applications">View</a>
    
    
              </div>
    
          </div>
    
         {{--    <div class="panel" style="width:20%;">
    
                    <div class="text-center" style="margin:2rem;">
    
                        <p class="title">
    
                                Open Application
    
                        </p><br>
    
    
                        <a class="btn btn-primary" href="/main-cordinator/open-letter-requests">View Company</a>
    
    
                    </div>
    
    
            </div> --}}

    </div>

@stop



