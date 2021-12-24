@extends('supervisor.layout.auth')

@section('content')

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/supervisor/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Interns</li>
            </ol>
          </nav>

        <div class="row d-flex justify-content-center">

            <div class="col-md-8 col-lg-8">

                @if ($confirmedAppcode)

                    @if ($confirmedAppcode->company_id)

                    <div class="row">

                        @foreach ($studentApplication as $application)

                            <div class="col-md-4 col-lg-4">

                                <div class="card">
                
                                    <div class="card-body text-center">
                
                                        <img class="rounded-circle"  style="width:5rem;" src="{{$application->student->avatar}}" alt="">
                    
                                        <p class="title">{{$application->student->name}}</p><br>
                    
                                        <a class="btn btn-primary" href="/supervisor/assess/{{$application->student->id}}/interns">Assess Student</a>

                                    </div>
                                    
                                </div>

                            </div>
                        
                        @endforeach

                    </div> <br>

                    {{ $studentApplication->links() }}

                    @elseif($confirmedAppcode->application_id)

                        <div class="card">
                            <div class="card-header"><strong><span class="fas fa-user-md"></span> Intern(s)</strong> </div>
                        </div><br>
                            
                        <div class="col-md-4 col-lg-4">
                    
                            <div class="card">
                        
                                <div class="card-body text-center">
                
                                    <img class="rounded-circle"  style="width:5rem;" src="{{$studentApplication->student->avatar}}" alt="">
                
                                <p class="title">{{$studentApplication->student->name}}</p><br>
                
                                <a class="btn btn-primary" href="/supervisor/assess/{{$studentApplication->student->id}}/interns">Assess Student</a>

                                </div>
                                    
                            </div>

                        </div>
                        
                    @endif
                    
                @endif

            </div>

        </div> <br>

    </div>
    
@endsection