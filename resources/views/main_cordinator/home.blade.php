@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')

<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 


</style>
    
@endsection

@section('content_header')

    <h4><a href="/main-cordinator/dashboard">Dashboard</a></h4>

     <div style="margin-left:50%;">

      <form action="/main-cordinator/toggle" method="post">
    
          @csrf
          @method('PATCH')
          <!-- Rounded switch -->
          <label class="switch">
              <input type="checkbox" name="toggle" {{ $toggleapp->toggle ? 'checked' :'' }} onchange="this.form.submit();">
              
              <span class="slider round"></span>
      
          </label>

      </form>
    
    </div>          
@stop

@section('content')

    @include('includes.errors')

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
    <script> /* console.log('Hi!'); */

       
     </script>
@stop
