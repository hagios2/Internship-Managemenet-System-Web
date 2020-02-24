<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <section>
        <img style="width:5rem; float:left;" src="{{storage_path('app/public/images/logo.jpg')}}" alt="logo">
        <header style="text-align:center;">
         <h3 style="display:inline;">University of  Energy and Natural Resources</h3><br>
        <p style="display:inline;">
            Post Office Box 214, Sunyani <br>
            Tel: +233 (0208) 193945/ +233 (0)543 392988 <br>
            Email: iao@uenr.edu.gh <br>
            Website: www.uenr.edu.gh
        </p>
        </header>
    </section>

    <section>
        <span style="display:inline">

            Our Ref ......................

        </span>
        <span style="margin-left:55%;">
            Date: {{ date('d F Y') }}
        </span>
    </section>

    <hr>

   <section>
       <strong>
           HUMAN RESOURCES AND ADMINSTRATIVE MANAGER <br>
           {{ $application->company->company_name }} <br>
           {{ $application->company->location }}
       </strong>
   </section>

    <br>
    Dear Sir,

    <h5 class="title">LETTER OF INTRODUCTION - STUDENT INDUSTRIAL/PRACTICAL ATTACHMENT</h5>
    <p>
        Following our request for placement of our student for industrial attachment in your In-v,tltunon 
        your subsequent acceptance of same, we m•ite to introduce to you the under-listed student(s) to 
        Industrial attachment with Y'our organization from first week of June to August, {{ date('Y') }} 
    </p>

    <div class="container">
        <table class="table table-bordered" {{-- style="border:black 1px solid" --}} style="width:100%;">

            <thead>
                <tr>
                    <th>Name of Student</th>
                    <th>Level</th>
                    <th>Programme</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach ($student as $applicant)
    
                    <tr>
    
                        <td> {{$applicant->name}}</td>
                        <td> {{$applicant->level->level}}</td>
                        <td> {{$applicant->program->program}}</td>
    
                    </tr>
                    
                @endforeach
            </tbody>
    
        </table>
    
    </div>

    <p>
        We wish indicate that a team of lecturers will visit your institution In the course of their 
        (the actual date will be communicated later) to assess the performance of students as a policy of the 
        university and obtam feedback which would help to improve upon the Industrial altachment 
        programme. 
        We hope the student would be accorded the needed practical training and assistance possible to help 
        achieve the objectives of the programme. 
        Thank you very much for your support and commitlnent in helping to develop the human resources and 
        skills required to solve critical energy, natural resources and management challenges of the society
    </p>
    <br>

   
    INDUSTRIAL ATTACHMENT <br>
    Dominic Otoo (PhD) <br>
    Industrial Attachment Coordinator <br>

    
</body>
</html>