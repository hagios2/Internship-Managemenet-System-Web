@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
   
     <div class="panel" style="width:20%;">

                <div class="text-center" style="margin:2rem;">

                    <p class="title">

                            Internship Registration

                    </p><br>


                    <a class="btn btn-primary" href="internshipapply">Apply</a>


                </div>


        </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop