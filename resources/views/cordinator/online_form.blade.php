

    <div class=""><strong><span class="fas fa-user-md"></span> Assessment form</strong></div> <br>

    <div><br>

        <div style="margin:1rem;">


                <div id="edit_first-form">

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
                                    <input type="radio" name="interns_understanding_of_companys_business" {{ $student->assessment->interns_understanding_of_companys_business == 'Exceptional' ? 'checked disabled' : 'disabled' }}  class="form-check-input" id="exampleCheck1" value="Exceptional">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" name="interns_understanding_of_companys_business" {{ $student->assessment->interns_understanding_of_companys_business == 'Good' ? 'checked disabled' : 'disabled' }}  class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="interns_understanding_of_companys_business" {{ $student->assessment->interns_understanding_of_companys_business == 'Satisfactory' ? 'checked disabled' : 'disabled' }}  class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="interns_understanding_of_companys_business" {{ $student->assessment->interns_understanding_of_companys_business == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }}  class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Intern's technical abilites</th>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="interns_technical_abilities" {{ $student->assessment->interns_technical_abilities == 'Exceptional' ? 'checked disabled' : 'disabled' }}  class="form-check-input" id="exampleCheck1" value="Exceptional">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" name="interns_technical_abilities" {{ $student->assessment->interns_technical_abilities == 'Good' ? 'checked disabled' : 'disabled' }}  class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="interns_technical_abilities" {{ $student->assessment->interns_technical_abilities == 'Satisfactory' ? 'checked disabled' : 'disabled' }}  class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="interns_technical_abilities" {{ $student->assessment->interns_technical_abilities == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }}  class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">General impression about intern</th>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="general_impression_about_intern" {{ $student->assessment->general_impression_about_intern == 'Exceptional' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Exceptional">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" {{ $student->assessment->general_impression_about_intern == 'Good' ? 'checked disabled' : 'disabled' }} name="general_impression_about_intern" class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" {{ $student->assessment->general_impression_about_intern == 'Satisfactory' ? 'checked disabled' : 'disabled' }} name="general_impression_about_intern" class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="general_impression_about_intern" {{ $student->assessment->general_impression_about_intern == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table> <br>

                    
                    <div class="form-group">

                        <label for="additonalComments">Additional comment about intern <em>(strength, weakness, etc, if applicable)</em></label>
                        
                        <textarea name="additional_comment_about_intern" id="" cols="70" disabled placeholder="Comment ....." rows="3">{{ $student->assessment->additional_comment_about_intern }}</textarea>
                    </div>

                    <div class="alert alert-info" role="alert">

                       <span class="glyphicon glyphicon-info-sign"></span>&nbsp;Please Fill section B and C and click on save to submit the form

                    </div>


                    <form action="cordinator/asess/{{ $student }}" method="post">

                        @csrf
                        @method('PATCH')


                        <label for="additonalComments"><strong>B. ASSESSOR (Lecturer) Assessment</strong> <em>(during interaction)</em></label>

                        <table class="table table-hover">
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
                                <th scope="row">Intern's technical abilites</th>
                                <td>
                                    <div class="form-check">
                                        <input type="radio" name="coordinators_interns_technical_abilities" {{ $student->assessment->coordinators_interns_technical_abilities == 'Exceptional' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Exceptional">
                                    </div>
                                </td>
                                <td> 
                                    <div class="form-check">
                                        <input type="radio" name="coordinators_interns_technical_abilities" {{ $student->assessment->coordinators_interns_technical_abilities == 'Good' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input type="radio" name="coordinators_interns_technical_abilities" {{ $student->assessment->coordinators_interns_technical_abilities == 'Satisfactory' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input type="radio" name="coordinators_interns_technical_abilities" {{ $student->assessment->coordinators_interns_technical_abilities == 'Unsatisfactory' ? 'checked' : '' }}  class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">General impression about intern</th>
                                <td>
                                    <div class="form-check">
                                        <input type="radio" name="coordinators_general_impression_about_intern" {{ $student->assessment->coordinators_general_impression_about_intern == 'Exceptional' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Exceptional">
                                    </div>
                                </td>
                                <td> 
                                    <div class="form-check">
                                        <input type="radio" {{ $student->assessment->coordinators_general_impression_about_intern == 'Good' ? 'checked' : '' }} name="coordinators_general_impression_about_intern" class="form-check-input" id="exampleCheck1" value="Good">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input type="radio" {{ $student->assessment->coordinators_general_impression_about_intern == 'Satisfactory' ? 'checked' : '' }} name="coordinators_general_impression_about_intern" class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input type="radio" name="coordinators_general_impression_about_intern" {{ $student->assessment->coordinators_general_impression_about_intern == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
    
                            <label for="additonalComments">Additional Comments</label><br>
                            
                            <textarea name="coordinators_additional_comment" id="coordinators_additional_comment" cols="70" placeholder="Comment ....." rows="3">{{ $student->assessment->coodinator_additional_comment }}</textarea>
                          </div>

                        <div class="form-group">
                          <label style="display:inline;" for="exampleInputEmail1"><strong>C. COMPANY'S ACTIVITY RELEVANCE TO PROGRAM OF STUDY.</strong><br> 
                            </label>On a scale of 1 to 10, with 1 being the least, how relevant do you think intern’s activities at
                            the institution to the program of study? &emsp;
                        <input style="display:inline;" type="number" name="companys_activity_relevance" id="companys_activity_relevance" value="{{ $student->assessment->companys_activity_relevance }}"  id="" 
                          max="10" min="1" aria-describedby="emailHelp" placeholder="Enter number">

                        </div>

                    </form>

                    <div id="spina" class="fa-3x text-center" style="display:none;">
                        <i class="fas fa-spinner fa-pulse"></i>
                    </div>


                    <div id="flash" class="alert alert-success text-center" style="display:none;" ></div>
{{-- 
                    <a href="javascript:void(0);" class="btn btn-primary pull-right edit_next">Next >></a> --}}
                    
                </div>

                <div id="edit_second-form" style="display:none;">

                    <h5 class="title text-center"><strong><u>INDUSTRIAL SUPERVISOR ASSESSMENT AND EVALUATION FORM</u></strong></h5>

                    <div class="form-group">

                        <label for="additonalComments"><strong>Section A: Assessment on the Quality of the Internship Report</strong></label>
                        
                        <textarea id="" name="quality_of_internship_report" cols="70" disabled placeholder="Comment ....." rows="3"> {{ $student->assessment->quality_of_internship_report }}</textarea>
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
                                    <input type="radio" name="working_attitude_and_discipline" {{ $student->assessment->working_attitude_and_discipline == 'Excellent' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="working_attitude_and_discipline" {{ $student->assessment->working_attitude_and_discipline == 'Very Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" name="working_attitude_and_discipline" {{ $student->assessment->working_attitude_and_discipline == 'Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="working_attitude_and_discipline" {{ $student->assessment->working_attitude_and_discipline == 'Satisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="working_attitude_and_discipline" {{ $student->assessment->working_attitude_and_discipline == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Productivity and quality of work</th>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="productivity_and_quality_of_work" {{ $student->assessment->productivity_and_quality_of_work == 'Excellent' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" name="productivity_and_quality_of_work" {{ $student->assessment->productivity_and_quality_of_work == 'Very Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="productivity_and_quality_of_work" {{ $student->assessment->productivity_and_quality_of_work == 'Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="productivity_and_quality_of_work" {{ $student->assessment->productivity_and_quality_of_work == 'Satisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="productivity_and_quality_of_work" {{ $student->assessment->productivity_and_quality_of_work == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Knowledge and problem-solving skills</th>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="knowledge_and_problem_solving_skills" {{ $student->assessment->knowledge_and_problem_solving_skills == 'Excellent' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="EXcellent">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" name="knowledge_and_problem_solving_skills" {{ $student->assessment->knowledge_and_problem_solving_skills == 'Very Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="knowledge_and_problem_solving_skills" {{ $student->assessment->knowledge_and_problem_solving_skills == 'Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="knowledge_and_problem_solving_skills" {{ $student->assessment->knowledge_and_problem_solving_skills == 'Satisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="knowledge_and_problem_solving_skills" {{ $student->assessment->knowledge_and_problem_solving_skills == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Technical skills in using engineering tools</th>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="technical_skills_in_using_engineering_tools" {{ $student->assessment->technical_skills_in_using_engineering_tools == 'Excellent' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" name="technical_skills_in_using_engineering_tools" {{ $student->assessment->technical_skills_in_using_engineering_tools == 'Very Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="technical_skills_in_using_engineering_tools" {{ $student->assessment->technical_skills_in_using_engineering_tools == 'Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="technical_skills_in_using_engineering_tools" {{ $student->assessment->technical_skills_in_using_engineering_tools == 'Satisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="technical_skills_in_using_engineering_tools" {{ $student->assessment->technical_skills_in_using_engineering_tools == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Verbal and written communication skills</th>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="verbal_and_written_communication_skills" {{ $student->assessment->verbal_and_written_communication_skills == 'Excellent' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" name="verbal_and_written_communication_skills" {{ $student->assessment->verbal_and_written_communication_skills == 'Very Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="verbal_and_written_communication_skills" {{ $student->assessment->verbal_and_written_communication_skills == 'Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="verbal_and_written_communication_skills" {{ $student->assessment->verbal_and_written_communication_skills == 'Satisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="verbal_and_written_communication_skills" {{ $student->assessment->verbal_and_written_communication_skills == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Teamwork and leadership skills</th>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="teamwork_and_leadership_skills" {{ $student->assessment->teamwork_and_leadership_skills == 'Excellent' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Excellent">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" name="teamwork_and_leadership_skills" {{ $student->assessment->teamwork_and_leadership_skills == 'Very Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="teamwork_and_leadership_skills" {{ $student->assessment->teamwork_and_leadership_skills == 'Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="teamwork_and_leadership_skills" {{ $student->assessment->teamwork_and_leadership_skills == 'Satisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="teamwork_and_leadership_skills" {{ $student->assessment->teamwork_and_leadership_skills == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Ability to learn new knowledge and skills</th>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ $student->assessment->ability_to_learn_new_knowledge_and_skills == 'Excellent' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="EXcellent">
                                </div>
                            </td>
                            <td> 
                                <div class="form-check">
                                    <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ $student->assessment->ability_to_learn_new_knowledge_and_skills == 'Very Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Very Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ $student->assessment->ability_to_learn_new_knowledge_and_skills == 'Good' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Good">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ $student->assessment->ability_to_learn_new_knowledge_and_skills == 'Satisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Satisfactory">
                                </div>
                            </td>
                            <td>
                                <div class="form-check">
                                    <input type="radio" name="ability_to_learn_new_knowledge_and_skills" {{ $student->assessment->ability_to_learn_new_knowledge_and_skills == 'Unsatisfactory' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="Unsatisfactory">
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table> <br>
                    
                    <div class="form-group">

                        <label for="additonalComments">Section C: Further Assessments on Attitude, Project Execution, Results, Competencies, etc.</label>
                        
                        <textarea name="section_c_additional_comments" id="" cols="70" disabled placeholder="Comment ....." rows="3">{{ $student->assessment->section_c_additional_comments }}</textarea>
                    </div>

                    <div class="form-group">

                        <label for="additonalComments">Section D: General Comments and Advice for the Student’s Future Improvements</label>
                        
                    <textarea name="section_D_additional_comments" id="" cols="70" disabled placeholder="Comment ....." rows="3">{{ $student->assessment->section_D_additional_comments }}</textarea>
                    </div>


                    <div class="form-group">
                    <label for="exampleInputEmail1">Would you be interested in hiring students from UENR for internship in the future?</label>

                        <div class="form-check">
                            <input name="hiring_interest" type="radio" {{ $student->assessment->hiring_interest == '1' ? 'checked disabled' : 'disabled' }}  class="form-check-input" id="exampleCheck1" value="1">&emsp;
                            <label for="Yes">Yes</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" name="hiring_interest" {{ $student->assessment->hiring_interest == '0' ? 'checked disabled' : 'disabled' }} class="form-check-input" id="exampleCheck1" value="0">&emsp;
                            <label for="No">No</label>
                        </div>
                    
                    </div>

                    <div class="form-group">
                        <label  for="exampleInputEmail1">If yes, how many?</label> &emsp;
                        <input style="display:inline;" name="no_of_students" value="{{ $student->assessment->no_of_students  }}" disabled type="number" {{-- class="form-control col-md-2 col-lg-2 col-xs-4 col-sm-4"  --}}style="width:10%;" id="exampleInputEmail1" 
                        min="1" aria-describedby="emailHelp" placeholder="Enter number">
                    </div>


                    <div class="form-group">

                        <label for="additonalComments">If no, please give reasons</label><br>
                        
                        <textarea name="reason" id="" cols="70" disabled placeholder="Reason ....." rows="3">{{ $student->assessment->reason }}</textarea>
                    </div>

                </div>

                <div id="flash" class="alert alert-success text-center" style="display:none;" ></div>

        </div>

    </div>
