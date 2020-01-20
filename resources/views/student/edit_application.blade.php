@extends('layouts.app')

@section('title', 'Internship App')

@section('content')

    <div class="container">
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Application form</li>
                </ol>
            </nav><br><br> <br>

        <div class="" style="width:60%;">

            @include('includes.errors')


            $@if ($application->default_application))

                <div>

                    <form method="POST" action="/internshipapply" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <input type="hidden" name="default_application" value="1">
                        </div>

                        <div class="form-group">

                                <table class="table ">

                                    <thead>
                                        <tr>
                                            <th></th> 
                                            <th>Company</th>
                                            <th>Region</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>

                                    <tbody>
            
                                        @forelse ($companies as $company)

                                        <tr>

                                            <td>
                                                <div class="form-group form-check">
                                                    <input type="radio" name="company_id" {{ $application->company_id == $company->id ? 'checked' :'' }} value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }} class="form-check-input" id="exampleCheck1">
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class="form-group ">
                                            
                                                    <label class="form-check-label" for="exampleCheck1">{{ $company->company_name }}</label>
                                            </div>
                                            </td>

                                            <td>

                                                {{ $company->region->region }}

                                            </td>

                                            <td>

                                                {{ $company->location }}

                                            </td>

                                        @empty

                                            <h3 class="title">Currently Not Available</h3>
                                        
                                        @endforelse
                                            
                                        </tr>

                                    </tbody>

                                </table>

                            <div class="form-group">

                                <label for="">Attach resume</label>
                                <input class="form-control-file" type="file" name="resume" id="">

                            </div>

                        </div> <br<br>

                        <button class="btn btn-primary" type=submit>Apply</button>
                    
                    </form>


                </div>

            @elseif($application->preferred_program))

                proposed company

            @else

                open letter
            @endif

        </div>

    </div>

@endSection
