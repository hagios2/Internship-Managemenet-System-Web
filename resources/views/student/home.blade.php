@extends('layouts.app')


@section('content')
   
    <div class="panel" style="width:20%;">

        @if (auth()->user()->applying_student)

            <div>

                <a class="btn btn-primary" href="/internshipapply/{{ auth()->user()->applying_student->id }}/edit">Edit</a>

            </div>

        @else

            <div class="text-center" style="margin:2rem;">

                <p class="title">

                    Internship Registration

                </p><br>


                <a class="btn btn-primary" href="internshipapply">Apply</a>

            </div>

        @endif

    </div>

@endsection