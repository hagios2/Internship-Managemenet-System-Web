@extends('supervisor.layout.auth')

@section('content')
<div class="container">

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
     {{--  <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body text-center">

                    <img src="" alt="">

                     <p class="title">

                            Internship Registration

                    </p><br>


                    <a class="btn btn-primary" href="/supervisor/view-interns">Apply</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
  
