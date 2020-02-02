@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')


@endsection

@section('content_header')

    <h4><a href="/main-cordinator/dashboard">Dashboard</a></h4>

     <div style="margin-left:50%;">

    
    </div>          
@stop

@section('content')

    @include('includes.errors')


    <div class="panel" style="width:20%;">

        <div class="text-center" style="margin:3rem;">


        <p class="title">

                

            </p><br>

            <a class="btn btn-primary" href="/main-cordinatordepartment">View</a>


        </div>

    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> /* console.log('Hi!'); */

       
     </script>
@stop
