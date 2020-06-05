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
   
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol> 
    </div>
  
@stop

@section('content')

    <div class="container">

      @include('includes.errors')
      
      <br>


      <div class="row" style="margin:auto;">

        <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">

          <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Recommended Applications</span>
              <span class="info-box-number" id="count_appointment">{{$default_app_count->count()}}<br>
                <p class="text-center"><small style="margin:auto;"> {{ $default_approved_count }} Approved</small></p>
              </span>
             
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->

        </div>
            
        <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">

          <div class="info-box">
            <!-- Apply any bg-* class to to the icon to color it -->
            <span class="info-box-icon bg-blue"><i class="fa fa-star-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Proposed Applications</span>
              <span class="info-box-number" id="count_appointment">{{$proposed_app_count}} <br>
                <p class="text-center"><small style="margin:auto;"> {{$no_proposed_approved}} Approved</small></p>
              </span>
             
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->

        </div>

        <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">

            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Application Switch</span>
                <span class="info-box-number"><br>
                  <form action="/main-cordinator/toggle" method="post">
                    @csrf
                    @method('PATCH')
                    <!-- Rounded switch -->
                     &emsp; <label class="switch"> 
                        <input type="checkbox" name="toggle" {{   $toggleapp->toggle ? 'checked' :'' }} onchange="this.form.submit();">
                        <span class="slider round"></span>
                
               </label>
                </form>
                  
                </span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

    </div><br><br>
{
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
