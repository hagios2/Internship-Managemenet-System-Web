@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-3">
            @include('student.profile')
        </div>
    
        {{-- <div class="justify-content-center"> --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body center">

                    @if (auth()->user()->applying_student)

                        <div>
                               @if (auth()->user()->applying_student->company->approved_application)
                                    
                                    <button class="btn btn-primary" disabled="disabled"> Edit</button>

                                    <a href="/interns" class="btn btn-primary">Intern's page</a>

                               @else

                                    <a class="btn btn-primary" disabled href="/internshipapply/{{ auth()->user()->applying_student->id }}/edit">Edit</a>
                                   
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