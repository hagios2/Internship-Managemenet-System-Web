@extends('supervisor.layout.auth')

@section('content')

    <div class="container">
     

        @if ($application)

            <div class="col-md-8 col-lg-9 offset-md-2">
                    
                <div class="card">

                    <div class="card-header"><strong><span class="fas fa-user-md"></span> Assessment form</strong></div> <br>

                    <div>

                        <a class="btn btn-success" href="/supervisor/download/assessment-forms"><i class="fas fa-download"></i> Download assessment forms</a>
                        
                        <form action="" method="post"></form>

                    </div> <br>


                    <div style="margin:1rem;">

                        <form>
                        
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
                                                <input type="radio" name="understanding_of_company_business" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="understanding_of_company_business" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="understanding_of_company_business" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="understanding_of_company_business" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Intern's technical abilites</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="technical_abilities" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" name="technical_abilities" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="technical_abilities" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="technical_abilities" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">General impression about intern</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="impression_about_intern" {{ old('impression_about_intern') == 'Exceptional' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" {{ old('impression_about_intern') == 'Good' ? 'checked' : '' }} name="impression_about_intern" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" {{ old('impression_about_intern') == 'Satisfactory' ? 'checked' : '' }} name="impression_about_intern" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" name="impression_about_intern" {{ old('impression_about_intern') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table> <br>
    
                                  
                                  <div class="form-group">
    
                                    <label for="additonalComments">Additional comment about intern <em>(strength, weakness, etc, if applicable)</em></label>
                                    
                                    <textarea name="additional_comments" {{ old('advisor_additional_comment') }} name="advisor_additional_comment" id="" cols="70" placeholder="Comment ....." rows="3"></textarea>
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
                                 
                                {{--   <a id="next" class="btn btn-primary">Next</a> --}}
                                  <button class="btn btn-primary offset-10" id="next">Next >></button>


                            </div>

                            <div id="second-form" style="display:none;">

                                <h5 class="title text-center"><strong><u>INDUSTRIAL SUPERVISOR ASSESSMENT AND EVALUATION FORM</u></strong></h5>

                                <div class="form-group">
    
                                    <label for="additonalComments"><strong>Section A: Assessment on the Quality of the Internship Report</strong></label>
                                    
                                    <textarea name="additional_comments" id="" name="quality_of_internship_report" {{ old('quality_of_internship_report') }} cols="70" placeholder="Comment ....." rows="3"></textarea>
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
                                                <input type="radio" {{ old('working_attitude') == 'Unsatisfactory' ? 'checked' : '' }} class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Productivity and quality of work</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Knowledge and problem-solving skills</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Technical skills in using engineering tools</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Verbal and written communication skills</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Teamwork and leadership skills</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Ability to learn new knowledge and skills</th>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td> 
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="exampleCheck1">
                                            </div>
                                        </td>
                                      </tr>

                                    </tbody>
                                  </table> <br>
                                  
                                  <div class="form-group">
    
                                    <label for="additonalComments">Section C: Further Assessments on Attitude, Project Execution, Results, Competencies, etc.</label>
                                    
                                    <textarea name="additional_comments" id="" cols="70" placeholder="Comment ....." rows="3"></textarea>
                                  </div>

                                  <div class="form-group">
    
                                    <label for="additonalComments">Section D: General Comments and Advice for the Student’s Future Improvements</label>
                                    
                                    <textarea name="additional_comments" id="" cols="70" placeholder="Comment ....." rows="3"></textarea>
                                  </div>
                        
    
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Would you be interested in hiring students from UENR for internship in the future?</label>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">&emsp;
                                        <label for="Yes">Yes</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">&emsp;
                                        <label for="No">No</label>
                                    </div>
                                 
                                </div>

                                <div class="form-group">
                                    <label  for="exampleInputEmail1">If yes, how many?</label> &emsp;
                                    <input style="display:inline;" type="number" class="form-control col-3" id="exampleInputEmail1" 
                                    min="1" aria-describedby="emailHelp" placeholder="Enter number">
          
                                  </div>


                                <div class="form-group">
    
                                    <label for="additonalComments">If no, please give reasons</label>
                                    
                                    <textarea name="additional_comments" id="" cols="70" placeholder="Reason ....." rows="3"></textarea>
                                  </div>
                        
                                 
                                <a id="previous" class="btn btn-primary pull-left"><< Previous</a>

                                <button type="submit" class="btn btn-success offset-8">Submit</button>
    
                            </div>
                                
                        </form>

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

@section('extra-js')

    <script>

        $(document).ready(function(){

            $('#next').click(function(e){
                e.preventDefault();

                $('#first-form').hide();

                $('#second-form').show();

            });


            $('#previous').click(function(){
                
                $('#first-form').show();

                $('#second-form').hide();
            });
        });

    </script>
    
@endsection