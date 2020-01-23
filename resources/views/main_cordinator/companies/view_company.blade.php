
@extends('adminlte::page')

@section('title', 'Internship App')

@section('content_header')

    @if($company)

    <a href="/main-cordinator/dashboard">Dashboard</a> / <a href="/main-cordinator/company">Company</a> / <a href="/main-cordinator/company/{{$company->id}}">{{$company->company_name}}</a>

    @endif

@stop

@section('content')

    @include('includes.errors') <br>

    <div class="container">

        @if($company)

            <div class="text-center">

                <div><h3>{{ $company->company_name }}</h3></div>

                <div>

                    <span><strong> Region: {{ $company->region->region}} | Total Slot: {{ $company->total_slots}}</strong>

                    <a style="margin-left:45%" class="btn btn-info" href="{{$company->id}}/edit">Edit Company Details</a>

                    </span>

                    @if ($company->application->count() > 0)

                        <span>
                
                            <button id="btn_approve" {{$company->approved_application ? 'disabled' : ''}} class="btn btn-success">Approve Application</button>
                
                            <form id="subform" action="/main-cordinator/application/{{ $company->id }}/approve" method="post">
                                @csrf
                
                            </form>
                
                        </span>
                    
                    @endif
                
                </div>

            </div><br>
            
            @if ($company->application->count() > 0)
            
                <div>         
                    <table class="table table-striped">
            
                        <thead>
            
                            <th>Student Name</th>
            
                            <th>Index No.</th>
            
                            <th>Program</th>
            
                            <th>Level</th>
            
                        </thead>

                        @foreach($company_applications as $application)

                            <tr>
            
                                <td>{{$application->student->name}}</td>
            
                                <td>{{ $application->student->index_no }}</td>
            
                                <td>{{$application->student->program->program}}</td>
            
                                <td>{{ $application->student->level->level }}</td>
            
                                <td><a class="btn btn-danger" href="/main-cordinator/{{$application->id}}/deny">Deny</a></td>
            
                            </tr>
        
                        @endforeach
        
                    </table>

                    @if ($company->approved_application)

                        @if ($company->approved_application->approved_letter == null)

                            <div>
                                <form action="/main-cordinator/introductory-letter/{{$company->approved_application->id}}/send" enctype="multipart/form-data" method="post">
                                    @csrf
    
                                    <div class="form-group">

                                        <label for="IntroLetter">Introductory Letter</label>

                                        <input type="file" class="form-control-file" name="letter" id=""> 

                                    </div>
                            
                                    <button type="submit" class="btn btn-primary">Send</button>
                            
                                </form>

                            </div>
                            
                        @else    

                            <div style="font-size:18px">

                                <h4 class="title">Introductory Letter</h4>

                                <div>

                                    <span class="glyphicon glyphicon-file"></span> <em>{{ explode('/', $company->approved_application->approved_letter ,4)[3] }}</em>

                                    <a href="/main-cordinator/letter/{{ $company->approved_application->id }}/preview" class="btn btn-default">Preview</a>

                                    <a id="rmv" class="btn btn-danger">Delete</a>

                                    <form id="rmv_form" action="/main-cordinator/letter/{{ $company->approved_application->id }}/delete" method="post">
                                    
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </div>

                            </div>
                            
                        @endif

                    @endif
                                
                </div><br><br>

                <div class="chat-div">

                    todo: <h2>Chat with students</h2>
                </div>
            
            @else

                <div class="container text-center">

                    <h3 class="title">No application(s) received for this company</h3>
                </div>
            
            @endif

        @endif

    </div>

@stop

@section('js')

    <script>

        $(document).ready(function(){

            $('#btn_approve').click(function(){

                $('form#subform').submit(); 
        
            });

            $('a#rmv').click(function(){

                $('form#rmv_form').submit(); 

            });

        });

    </script>
    
@endsection
