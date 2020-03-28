@extends('layouts.app')

@section('extra-css')

<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 

</style>
    
@endsection

@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    {{-- <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li> --}}
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav> <br>


  @include('includes.errors')

   <!-- Page Heading -->{{-- 
   <div class="d-sm-flex align-items-center justify-content-between mb-4"> --}}
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}} 

 {{--  </div>
 --}}
       <!-- Content Row -->
      <div class="row" style="margin:0 auto;">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Application (Switch)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <!-- Rounded switch -->
                    <label class="switch">
                      <input type="checkbox" name="toggle" disabled {{ $toggleapp->toggle ? 'checked' :'' }} onchange="this.form.submit();">
                      
                      <span class="slider round"></span>
                
                  </label>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-lock fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        @if (auth()->user()->application->started_at !== null)
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Appointment</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{auth()->user()->appointment}} appointment(s)</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
      </div> 

    {{--     <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
 --}}

      
      <div class="row">

        @if (auth()->user()->application)
        
            @if(auth()->user()->application->approvedProposedApplicaton)
            
                @if(auth()->user()->application->started_at !== null)

                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2"> 
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Intern</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Click here to visit the intern's page</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-user-tie fa-2x"></i>
                            </div>

                          </div>
                          <div style="margin-left:95%;">
                            <a href="/interns">
                              <div style="margin-top:5rem;">
                                <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                @else

                   <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Internship Application</div>

                            
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Click on the button below to start internship</div>
                          </div>
                          <div class="col-auto">
                            <i class="fab fa-wpforms fa-2x text-gray-300"></i>
                          </div>
                          </div>
                          <div style="margin-left:95%;">

                            <form style="display: none;" action="/start-internship/{{auth()->user()->application->id}}" method="post" id="str">
                                @csrf
                                @method('PATCH')

                               {{--  <button class="btn btn-primary" {{ auth()->user()->application->started_at ? 'disabled' : ''}} type="submit">Start Internship</button>
                             --}}
                            </form> 
                             <a href="/intern" onclick="event.preventDefault();
                             document.getElementById('str').submit();">
                              <div style="margin-top:5rem;">
                                <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                              </div>
                            </a> 
                         </div>
                      </div>
                    </div>
                  </div>
  
              @endif

            @endif
          
            @if(auth()->user()->application->company)

                @if (auth()->user()->application->company->approved_application)
                
                    @if(auth()->user()->application->started_at !== null)

                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Intern</div>

                                
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Click here to visit the intern's page</div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-user-tie fa-2x"></i>
                              </div>

                              </div>
                              <div style="margin-left:95%;">
                                <a href="/interns">
                                  <div style="margin-top:5rem;">
                                    <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                                  </div>
                                </a>
                              </div>
                          </div>
                        </div>
                      </div>

                    @else

                      <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Intern's Page</div>

                                    <form action="/start-internship/{{auth()->user()->application->id}}" method="post" id="sfr">
                                      @csrf
                                      @method('PATCH')

                                  {{--    <button class="btn btn-primary" {{ auth()->user()->application->started_at ? 'disabled' : ''}} type="submit">Start Internship</button> --}}
                                  
                                  </form>

                                
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Click here to start your internsihp</div>
                              </div>
                              <div class="col-auto">
                                <i class="fab fa-wpforms fa-2x text-gray-300"></i>
                              </div>
                              </div>
                              <div style="margin-left:95%;">
                                <a href="/internsihpapply" onclick="event.preventDefault();
                                document.getElementById('sfr').submit();">
                                  <div style="margin-top:5rem;">
                                    <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                                  </div>
                                </a>
                              </div>
                          </div>
                        </div>
                      </div>

                    @endif

                @else

                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Internship Application</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">Click here to visit the edit application</div>
                            </div>
                            <div class="col-auto">
                              <i class="fab fa-wpforms fa-2x text-gray-300"></i>
                            </div>
                            </div>
                            <div style="margin-left:95%;">
                              <a href="/internshipapply/{{ auth()->user()->application->id }}/edit">
                                <div style="margin-top:5rem;">
                                  <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                                </div>
                              </a>
                            </div>
                        </div>
                      </div>
                    </div>

                @endif

            @endif

        @else
            
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Internship Application</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><br><br><small>Click here to visit application page</small></div>
                      </div>
                      <div class="col-auto">
                        <i class="fab fa-wpforms fa-2x text-gray-300"></i>
                      </div>
                    </div>
                    <div style="margin-left:95%;">
                      <a href="/internshipapply">
                        <div style="margin-top:5rem;">
                          <i class="fas fa-arrow-right fa-x" style="color:#f7dc42"></i>
                        </div>
                      </a>
                    </div>
                </div>
              </div>
            </div>
       
        @endif

      </div>



        <!-- Earnings (Monthly) Card Example -->
        {{-- <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                    </div>
                    <div class="col">
                      <div class="progress progress-sm mr-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>


      <!-- Content Row -->

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Dropdown Header:</div>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
              </div>
              <div class="mt-4 text-center small">
                <span class="mr-2">
                  <i class="fas fa-circle text-primary"></i> Direct
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-success"></i> Social
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-info"></i> Referral
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

          <!-- Project Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">
              <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
              <div class="progress mb-4">
                <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6 mb-4">

          <!-- Illustrations -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
              <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
              </div>
              <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
              <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
            </div>
          </div>

          <!-- Approach -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
            </div>
            <div class="card-body">
              <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
              <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
            </div>
          </div>

        </div>
      </div> --}}




          {{--   <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

    
@endsection

