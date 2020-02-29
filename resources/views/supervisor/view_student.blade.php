@extends('supervisor.layout.auth')

@section('content')

    <div class="container">
     

        @if ($application)

            <div class="col-md-8 col-lg-8 offset-md-2">
                    
                <div class="card">

                    <div class="card-header"><strong><span class="fas fa-user-md"></span> Intern(s)</strong></div> <br>

                    <div>

                        <a class="btn btn-primary" href="/supervisor/download/assessment-forms">Download assessment</a>
                        
                        <form action="" method="post"></form>

                    </div>



                    </div>
                        
                </div>

            </div>

        @else 

            <div class="jumbotron text-center">

                <h2 class="title">Unknown Application</h2>

                <p>
                    Please return to the previous page and select a valid student
                </p>

            </div>
        
        @endif

    </div>
    
@endsection