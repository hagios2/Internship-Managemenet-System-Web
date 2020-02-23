@extends('layouts.app')

@section('content')

<div class="container">

    @include('includes.errors')

    <div class="row">

        <div class="col-md-3">
            @include('student.profile')
        </div>
    
        {{-- <div class="justify-content-center"> --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body center">

                    @if (auth()->user()->application)

                        <div>
                               
                            @if (auth()->user()->application->approvedProposedApplicaton)
                                    
                                @if (auth()->user()->application->started_at !== null)

                                    <a href="/interns" class="btn btn-primary">Interns page</a>
                                    
                                @else

                                    <form action="/start-internship/{{auth()->user()->application->id}}" method="post">
                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-primary" {{ auth()->user()->application->started_at ? 'disabled' : ''}} type="submit">Start Internship</button>
                                    
                                    </form>
                                    
                                @endif

                            @elseif(auth()->user()->application->company)

                                @if (auth()->user()->application->company->approved_application)

                                    @if (auth()->user()->application->started_at !== null)

                                        <a href="/interns" class="btn btn-primary">Interns page</a>
                                        
                                    @else

                                        <form action="/start-internship/{{auth()->user()->application->id}}" method="post">
                                            @csrf
                                            @method('PATCH')

                                            <button class="btn btn-primary" {{ auth()->user()->application->started_at ? 'disabled' : ''}} type="submit">Start Internship</button>
                                        
                                        </form>
                                        
                                    @endif
                                    
                                @endif

                            @else

                                <a class="btn btn-primary" href="/internshipapply/{{ auth()->user()->application->id }}/edit">Edit</a>
                                
                            @endif
                        

                        </div>

                    @else

                        <div class="text-center" style="margin:2rem;">

                            <p class="title">

                                Internship Registration

                            </p><br>

                            <a class="btn btn-primary" href="/internshipapply">Apply</a>

                        </div>

                    @endif
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection