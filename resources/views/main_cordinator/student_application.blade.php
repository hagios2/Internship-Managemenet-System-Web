@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/main-cordinator/dashboard">Dashboard</a></li>
            <li class="active">Student Application</li>
        </ol><br>

    </div>

@stop

@section('content')

    <div class="container"> 

        <div class="row" style="margin:auto 0;">

            <div class="col-md-3 col-lg-3"></div>

            <div class="col-md-3 col-lg-3">

                <div class="panel box box-primary" style="width:auto;">

                    <div class="text-center" style="margin:3rem;"> 
        
                        <p class="title">Recommeded Application</p><br>
        
                        <a class="btn btn-primary" href="/main-cordinator/default-applications">View</a>
        
                    </div>
        
                </div>

            </div>

            <div class="center-block col-md-3 col-lg-3">

                <div class="panel box box-warning" style="width:auto;">

                    <div class="text-center" style="margin:3rem;"> 
        
                        <p class="title">Other Applications</p><br>
        
                        <a class="btn btn-primary" id="propose" href="/main-cordinator/other-applications">View</a>
        
                    </div>
        
                </div>

            </div>

            <div class="col-md-3 col-lg-3"></div>

        </div>

    </div>

@stop



