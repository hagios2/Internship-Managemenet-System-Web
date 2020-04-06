@extends('supervisor.layout.auth')

@section('content')

    <div class="container">
     

        @if ($application)

            <div id="app_div" class="col-md-10 col-lg-10 offset-md-2">
                    
                <div class="card">

                    <div class="card-header"><strong><span class="fas fa-user-md"></span> Assessment form</strong></div> <br>

                    <div>

                        <div style="margin-left:5rem;display:inline;">

                            <a class="btn btn-success" href="/supervisor/download/assessment-forms"><i class="fas fa-download"></i> Download assessment forms</a>

                            @if ($application->student->assessment)

                                <a id="show_edit_form" href="javascript:void(0);" class="btn btn-outline-primary">Edit Student assessment</a>
                                
                            @endif

                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModalLong">
                            <i class="fas fa-file-upload"></i> &nbsp;  Upload filled assessment
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">

                                    <form id="modal-form" action="/supervisor/upload/{{ $application->student->id }}/assessment-forms" enctype="multipart/form-data" method="post">
                                    
                                        @csrf

                                        <div class="alert alert-info">
                                            <i class="fas fa-info"></i> &nbsp; Notice You can select and upload multiple files at the same time  
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                              <input type="file" class="custom-file-input" name="assessmentFile[]" multiple id="inputGroupFile01">
                                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                          </div>
                                          
                                    
                                    </form>
                                
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="modal-submit" class="btn btn-primary">Submit </button>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div><br>


                    <div style="margin:1rem;">

                        @include('includes.errors')

                        <form action="/supervisor/assess/{{$application->student->id}}/interns" method="POST">

                            @csrf
                        
                            <div id="first-form">

                                <h5 class="title text-center"><strong><u>INDUSTRIAL ATTACHMENT ASSESSOR REPORT FORM</u></strong></h5>

                                <label for="additonalComments"><strong>A. INDUSTRIAL SUPERVISOR ASSESSMENT</strong> Additional comment about intern <em>(strength, weakness, etc, if applicable)</em></label>
    
                                <table class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">Assessment Criteria</th>
                                        <th scope="col">Exceptional</th>
                                        <th scope="col">Good</th>
                                        <th scope="col">Satisfactory</th>
                                        <th scope="col">Unsatisfactory</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Intern's understanding of company's Business</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="interns_understanding_of_companys_business" {{ old('interns_understanding_of_companys_business') == 'Exceptional' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Exceptional">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="interns_understanding_of_companys_business" {{ old('interns_understanding_of_companys_business') == 'Good' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="interns_understanding_of_companys_business" {{ old('interns_understanding_of_companys_business') == 'Satisfactory' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="interns_understanding_of_companys_business" {{ old('interns_understanding_of_companys_business') == 'Unsatisfactory' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Intern's technical abilites</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="interns_technical_abilities" {{ old('interns_technical_abilities') == 'Exceptional' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Exceptional">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="interns_technical_abilities" {{ old('interns_technical_abilities') == 'Good' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="interns_technical_abilities" {{ old('interns_technical_abilities') == 'Satisfactory' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="interns_technical_abilities" {{ old('interns_technical_abilities') == 'Unsatisfactory' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">General impression about intern</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="general_impression_about_intern" {{ old('general_impression_about_intern') == 'Exceptional' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Exceptional">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" {{ old('general_impression_about_intern') == 'Good' ? 'checked' : '' }} name="general_impression_about_intern" class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" {{ old('general_impression_about_intern') == 'Satisfactory' ? 'checked' : '' }} name="general_impression_about_intern" class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="general_impression_about_intern" {{ old('general_impression_about_intern') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table> <br>
    
                                  
                                  <div class="form-group">
    
                                    <label for="additonalComments">Additional comment about intern <em>(strength, weakness, etc, if applicable)</em></label>
                                    
                                    <textarea name="additional_comment_about_intern" id="" cols="70" placeholder="Comment ....." rows="3">{{ old('additional_comment_about_intern') }}</textarea>
                                  </div>
    {{-- 
                                <div class="form-group">
                                  <label style="display:inline;" for="exampleInputEmail1"><strong>B. COMPANY'S ACTIVITY RELEVANCE TO PROGRAM OF STUDY.</strong><br> <em>On a scale of 1 to 10, with 1 being the least, how relevant do you think intern’s activities at
                                    the institution to the program of study?
                                    </em></label> &emsp;
                                  <input style="display:inline;" type="number" class="form-control col-3" id="exampleInputEmail1" 
                                  max="10" min="1" aria-describedby="emailHelp" placeholder="Enter number">
        
                                </div>
    
                                <div class="form-group offset-1">
                                    
                                    <label for="additonalComments">Additional comment about intern <em>(strength, weakness, etc, if applicable)</em></label>                                
                                    <textarea name="additional_comments" id="" cols="70" placeholder="Comment ....." rows="8"></textarea>
                                </div> --}}
                                 
                                <a href="javascript:void(0);" class="btn btn-primary offset-10" id="next">Next >></a>
                                  
                            </div>

                            <div id="second-form" style="display:none;">

                                <h5 class="title text-center"><strong><u>INDUSTRIAL SUPERVISOR ASSESSMENT AND EVALUATION FORM</u></strong></h5>

                                <div class="form-group">
    
                                    <label for="additonalComments"><strong>Section A: Assessment on the Quality of the Internship Report</strong></label>
                                    
                                    <textarea id="" name="quality_of_internship_report" cols="70" placeholder="Comment ....." rows="3"> {{ old('quality_of_internship_report') }}</textarea>
                                </div>

                                <label for="additonalComments"><strong>Behavorial Assessment</strong></label>
                                <table class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">Criteria</th>
                                        <th scope="col">Excellent</th>
                                        <th scope="col">Very Good</th>
                                        <th scope="col">Good</th>
                                        <th scope="col">Satisfactory</th>
                                        <th scope="col">Unsatisfactory</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Working attitude & discipline</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="working_attitude_and_discipline" {{ old('working_attitude_and_discipline') == 'Excellent' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="working_attitude_and_discipline" {{ old('working_attitude_and_discipline') == 'Very Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="working_attitude_and_discipline" {{ old('working_attitude_and_discipline') == 'Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="working_attitude_and_discipline" {{ old('working_attitude_and_discipline') == 'Satisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="working_attitude_and_discipline" {{ old('working_attitude_and_discipline') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Productivity and quality of work</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="productivity_and_quality_of_work" {{ old('productivity_and_quality_of_work') == 'Excellent' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="productivity_and_quality_of_work" {{ old('productivity_and_quality_of_work') == 'Very Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="productivity_and_quality_of_work" {{ old('productivity_and_quality_of_work') == 'Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="productivity_and_quality_of_work" {{ old('productivity_and_quality_of_work') == 'Satisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="productivity_and_quality_of_work" {{ old('productivity_and_quality_of_work') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Knowledge and problem-solving skills</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="knowledge_and_problem_solving_skills" {{ old('knowledge_and_problem_solving_skills') == 'Excellent' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="EXcellent">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="knowledge_and_problem_solving_skills" {{ old('knowledge_and_problem_solving_skills') == 'Very Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="knowledge_and_problem_solving_skills" {{ old('knowledge_and_problem_solving_skills') == 'Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="knowledge_and_problem_solving_skills" {{ old('knowledge_and_problem_solving_skills') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="knowledge_and_problem_solving_skills" {{ old('knowledge_and_problem_solving_skills') == 'Satisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Technical skills in using engineering tools</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="technical_skills_in_using_engineering_tools" {{ old('technical_skills_in_using engineering_tools') == 'Excellent' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="technical_skills_in_using_engineering_tools" {{ old('technical_skills_in_using_engineering_tools') == 'Very Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="technical_skills_in_using_engineering_tools" {{ old('technical_skills_in_using_engineering_tools') == 'Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="technical_skills_in_using_engineering_tools" {{ old('technical_skills_in_using_engineering_tools') == 'Satisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="technical_skills_in_using_engineering_tools" {{ old('technical_skills_in_using_engineering_tools') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Verbal and written communication skills</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="verbal_and_written_communication_skills" {{ old('verbal_and_written_communication_skills') == 'Excellent' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="verbal_and_written_communication_skills" {{ old('verbal_and_written_communication_skills') == 'Very Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="verbal_and_written_communication_skills" {{ old('verbal_and_written_communication_skills') == 'Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="verbal_and_written_communication_skills" {{ old('verbal_and_written_communication_skills') == 'Satisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="verbal_and_written_communication_skills" {{ old('verbal_and_written_communication_skills') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Teamwork and leadership skills</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="teamwork_and_leadership_skills" {{ old('teamwork_and_leadership_skills') == 'Excellent' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="teamwork_and_leadership_skills" {{ old('teamwork_and_leadership_skills') == 'Very Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="teamwork_and_leadership_skills" {{ old('teamwork_and_leadership_skills') == 'Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="teamwork_and_leadership_skills" {{ old('teamwork_and_leadership_skills') == 'Satisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="teamwork_and_leadership_skills" {{ old('teamwork_and_leadership_skills') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Ability to learn new knowledge and skills</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ old('ability_to_learn_new_knowledge_and_skills') == 'Excellent' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="EXcellent">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ old('ability_to_learn_new_knowledge_and_skills') == 'Very Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ old('ability_to_learn_new_knowledge_and_skills') == 'Good' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Good">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ old('ability_to_learn_new_knowledge_and_skills') == 'Satisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ old('ability_to_learn_new_knowledge_and_skills') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                            </div>
                                        </td>
                                      </tr>

                                    </tbody>
                                  </table> <br>
                                  
                                  <div class="form-group">
    
                                    <label for="additonalComments">Section C: Further Assessments on Attitude, Project Execution, Results, Competencies, etc.</label>
                                    
                                  <textarea name="section_c_additional_comments" id="" cols="70" placeholder="Comment ....." rows="3">{{ old('section_c_additional_comments')}}</textarea>
                                  </div>

                                  <div class="form-group">
    
                                    <label for="additonalComments">Section D: General Comments and Advice for the Student’s Future Improvements</label>
                                    
                                  <textarea name="section_D_additional_comments" id="" cols="70" placeholder="Comment ....." rows="3">{{ old('section_D_additional_comments') }}</textarea>
                                  </div>
                        
    
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Would you be interested in hiring students from UENR for internship in the future?</label>

                                    <div class="form-check">
                                        <input name="hiring_interest" type="radio" {{ old('hiring_interest') == '1' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="1">&emsp;
                                        <label for="Yes">Yes</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" name="hiring_interest" {{ old('hiring_interest') == '0' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="0">&emsp;
                                        <label for="No">No</label>
                                    </div>
                                 
                                </div>

                                <div class="form-group">
                                    <label  for="exampleInputEmail1">If yes, how many?</label> &emsp;
                                    <input style="display:inline;" name="no_of_students" {{ old('no_of_students') }} type="number" class="form-control col-3" id="exampleInputEmail1" 
                                    min="1" aria-describedby="emailHelp" placeholder="Enter number">
          
                                  </div>


                                <div class="form-group">
    
                                    <label for="additonalComments">If no, please give reasons</label>
                                    
                                    <textarea name="reason" id="" cols="70" placeholder="Reason ....." rows="3"></textarea>
                                  </div>
                        
                                 
                                <a id="previous" href="javascript:void(0);" class="btn btn-primary pull-left"><< Previous</a>

                                <button type="submit" class="btn btn-success offset-8">Submit</button>
    
                            </div>
                                
                        </form>

                     </div>                    
                        
                </div>

            </div>

            <div id="edit_div" class="col-md-8 col-lg-9 offset-md-2" style="display: none;">

                @if ($application->student->assessment)

                    <a href="javascript:void(0);" id="back" class="btn btn-outline-primary"><< Back</a><br><br>

                    @include('supervisor.edit')

                        
                @endif


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

@section('extra-js')

    <script>

        $(document).ready(function(){

            $('#next').click(function(e){

                e.preventDefault();

                hideAndshow('#second-form', '#first-form');

            });


            $('#previous').click(function(e){

                hideAndshow('#first-form', '#second-form');
            });


            $('#show_edit_form').click(function(e){

                e.preventDefault();

                $(this).hide()

                hideAndshow('#edit_div', '#app_div')
            });


            /* edit page buttons */

            $('#edit_next').click(function(e){

                e.preventDefault();

                hideAndshow('#edit_second-form', '#edit_first-form');

            });


            $('#edit_previous').click(function(e){

                hideAndshow('#edit_first-form', '#edit_second-form');

            });


            $('#back').click(function(e){

                e.preventDefault();

                $('#show_edit_form').show();

                hideAndshow('#app_div', '#edit_div')
                
            });


            function hideAndshow(showdiv, hidediv)
            {

                $(showdiv).show();

                $(hidediv).hide();
            }


            $('#modal-submit').click(function(){


                $('#modal-form').submit();
            })

        });


    </script>
    
@endsection