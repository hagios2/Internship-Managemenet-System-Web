@extends('adminlte::page')

@section('css')
    
@endsection

@section('content_header')

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/main-cordinator/dashboard">Dashboard</a></li>
            <li class="active">Departments</li>
        </ol>
    </div>
  
@stop

@section('content')

    <div class="container">

      @include('includes.errors')
      
      <br>

      <div class="col-md-9 col-lg-9">

        <a class="btn btn-default pull-left" href="/main-cordinator/dashboard"><< Back</a>

        <div class="col-md-7 pull-right">
            <form action="department" method="post">
                @csrf

                <div class="form-group">
                    <input type="text" name="department" class="form-control col-md-4" id="" placeholder="Department"  style="display: inline"><br>

                    <button class="btn btn-primary" style="display: inline">Add</button>
                </div>
                  
            </form>
        </div>
        
      </div>

      <div class="row">

        <div class="col-md-1 col-lg-1"></div>

        <div class="col-md-9 col-lg-9">

            @if ($departments)

                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <td>DEPARTMENT</td>
                    </thead>
                    <tbody>
                        @forelse ($departments as $department)
                        <tr>
                                <td>{{ $department->id}}</td>
                                <td>{{ $department->department}}</td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>

                {{ $departments->links() }}
            @else

                <div class="jumbotron">
                    <div class="container text-center">

                        <h3 class="title">No Department(s) added </h3>
                        <small>You may add a deprtment </small>

                    </div>
                
                </div>
                
            @endif
    
        </div>

        <div class="col-md-1 col-lg-1"></div>

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
