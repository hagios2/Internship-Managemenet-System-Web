@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <i><a href="/main-cordinator/dashboard">Dashboard</a></i>
@stop

@section('content')

    <div class="row">

        <div class="panel" style="width:20%;">

            <div class="text-center" style="margin:3rem;">


            <p class="title">

                    Department

                </p><br>

                <a class="btn btn-primary" href="department">View Company</a>


            </div>


        </div>

        <div class="panel" style="width:20%;">

                <div class="text-center" style="margin:2rem;">

                    <p class="title">

                            Companies

                    </p><br>


                    <a class="btn btn-primary" href="company">View Company</a>


                </div>


        </div>


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
