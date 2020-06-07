<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('name', 'UENR INTERNSHIP') }}</title>

    <link rel="shortcut icon" href="{{ asset('/storage/images/logo.jpg') }}" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Fonts and Icons -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    @include('links')
{{-- 
    @yield('styles') --}}

</head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- loader start -->
        @stack('loader')
    <!-- loader end -->
        <body>

        <div id="app">
          
            @yield('content')

            <Section id="Home">
                <h1 class="sr-only">Home section</h1>
                <!--nav start-->


            <nav class="navbar navbar-fixed-top yellow">
                
                <div class="container-fluid">
       
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><img src="https://i1.wp.com/aschoolz.com/wp-content/uploads/2019/03/UENRlogo.png?resize=320%2C136&ssl=1"  alt="kokrokoo"></a>
                    </div>
            
                    <div class="container">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse  ">
                            
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="#Home" class="scroll">Home</a></li>
                                {{-- <li><a href="#about-us" class="scroll">About</a></li> --}}
                                <li><a href="#services" class="scroll">Services</a></li>

                                <li><a href="#portfolio" class="scroll">How it works</a></li>
                                <li><a href="#contact-us" class="scroll">Contact Us</a></li>      

                                @if (auth()->guard('main_cordinator')->check())

                                   <li><a href="/main-cordinator/dashboard"  class="btn button  pull-right" role="button">&larr; Dashboard</a></li>
                                    
                                @elseif(auth()->guard('cordinator')->check())
                    
                                   <li><a href="/cordinator/dashboard"  class="btn button  pull-right" role="button">&larr; Dashboard</a></li>
                    
                                @elseif(auth()->guard('supervisor')->check())
                    
                                   <li> <a href="/supervisor/dashboard"  class="btn button  pull-right" role="button">&larr; Dashboard</a></li>
                    
                                @elseif(auth()->check())
                    
                                    <li><a href="/dashboard"  class="btn button  pull-right" role="button">&larr; Dashboard</a></li>

                                @else
                                    
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="/register" style="color: #0c0c0c">Student</a></li>
                                                <li><a href="/cordinator/register" style="color: #0c0c0c">Lecture</a></li>
                                                <li><a href="/supervisor/register" style="color: #0c0c0c">Intern Supervisor</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in"></i> <b>Log in<b> <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="/login" style="color: #0c0c0c">Student</a></li>
                                                <li><a href="/cordinator/login" style="color: #0c0c0c">Lecture</a></li>
                                                <li><a href="main-cordinator/login" style="color: #0c0c0c">Main Cordinator</a></li>
                                                <li><a href="/supervisor/login" style="color: #0c0c0c">Intern Supervisor</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                @endif

                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
            
            
                </div>
            </nav>
            <!--nav end-->
                <div id="slider">
                    <!-- START REVOLUTION SLIDER 5.0 -->

                <div class="rev_slider_wrapper">
                    <div id="slider1" class="rev_slider" data-version="5.0">
                        <ul>
                            <li data-transition="slideup" data-title="01" data-delay="5000">
                                <!-- MAIN IMAGE -->
                                <img src="http://www.themesindustry.com/html/riwa/images/cover2.jpg" alt="cover" width="1920" height="1280">
                                <!-- LAYER NR. 1 -->
                                <h1 class="tp-caption News-Title text-center"
                                    data-x="middle" data-hoffset=""
                                    data-y="middle" data-voffset=""
                                    data-whitespace="normal"
                                    data-transform_idle="o:1;"
                                    data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
                                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                    data-start="1000" data-fontsize="65">Internship
                                </h1>
                                <h1 class="tp-caption News-Title  text-center"
                                    data-x="middle" data-hoffset=""
                                    data-y="middle" data-voffset="70"
                                    data-whitespace="normal"
                                    data-transform_idle="o:1;"
                                    data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                    data-start="1500" data-width="670" data-fontsize="65">made much   <span>easier</span>
                                </h1>
                                <p class="tp-caption News-Title  text-center"
                                   data-x="middle" data-hoffset=""
                                   data-y="middle" data-voffset="125"
                                   data-whitespace="normal"
                                   data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                   data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                   data-start="2200" data-width="870" data-fontsize="18">providing an advanced way
                                    of linking you to advertising  media outlets without human intervention.
                                </p>
                                <div class="tp-caption  News-Title tp-resizeme" data-x="middle"
                
                                     data-y="middle"
                                     data-voffset="200"
                                     data-hoffset="['-80','-80','-150','-200']" data-transform_idle="o:1;"
                                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                     data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                     data-start="3000"><a href="/login" class="btn button first scroll">Start Now</a>
                                </div>
                                <div class="tp-caption  News-Title tp-resizeme" data-x="middle"
                
                                     data-y="middle"
                                     data-voffset="200"
                                     data-hoffset="['100','100','0','0']"
                                     data-transform_idle="o:1;"
                                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                     data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                     data-start="3000">{{-- @include('includes.pages.partials.buttons.publish-button') --}}
                                </div>
                            </li>
                            <li data-transition="slideup" data-title="02" data-delay="5000">
                                <!-- MAIN IMAGE -->
                                <img src="http://www.themesindustry.com/html/riwa/images/cover.jpg" alt="cover" width="1920" height="1280">
                                <!-- LAYER NR. 1 -->
                                <h1 class="tp-caption News-Title text-center"
                                    data-x="middle" data-hoffset=""
                                    data-y="middle" data-voffset=""
                                    data-whitespace="normal"
                                    data-transform_idle="o:1;"
                                    data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
                                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                    data-start="1000" data-fontsize="65">Track
                                </h1>
                                <h1 class="tp-caption News-Title  text-center"
                                    data-x="middle" data-hoffset=""
                                    data-y="middle" data-voffset="70"
                                    data-whitespace="normal"
                                    data-transform_idle="o:1;"
                                    data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                    data-start="1500" data-width="670" data-fontsize="65">Your ads  <span>anytime</span>
                                </h1>
                                <p class="tp-caption News-Title  text-center"
                                   data-x="middle" data-hoffset=""
                                   data-y="middle" data-voffset="125"
                                   data-whitespace="normal"
                                   data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                   data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                   data-start="2200" data-width="870" data-fontsize="18">Tracking of ad submissions  whiles sitting at the
                                    comfort of your homes and offices.
                                </p>
                                <div class="tp-caption  News-Title tp-resizeme" data-x="middle"
                
                                     data-y="middle"
                                     data-voffset="200"
                                     data-hoffset="['-80','-80','-150','-200']" data-transform_idle="o:1;"
                                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                     data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                     data-start="3000"><a href="#about-us" class="btn button first scroll">Start Now</a>
                                </div>
                                <div class="tp-caption  News-Title tp-resizeme" data-x="middle"
                
                                     data-y="middle"
                                     data-voffset="200"
                                     data-hoffset="['100','100','0','0']"
                                     data-transform_idle="o:1;"
                                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                     data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                     data-start="3000">{{--  @include('includes.pages.partials.buttons.publish-button') --}}
                                </div>
                            </li>
                            <li data-transition="slideup" data-title="03" data-delay="5000">
                                <!-- MAIN IMAGE -->
                                <img src="http://www.themesindustry.com/html/riwa/images/cover3.jpg" alt="cover" width="1920" height="1280">
                                <!-- LAYER NR. 1 -->
                                <h1 class="tp-caption News-Title text-center"
                                    data-x="middle" data-hoffset=""
                                    data-y="middle" data-voffset=""
                                    data-whitespace="normal"
                                    data-transform_idle="o:1;"
                                    data-transform_in="y:-50px;opacity:0;s:1500;e:Power3.easeOut;"
                                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                    data-start="1000" data-fontsize="60">Growing
                                </h1>
                                <h1 class="tp-caption News-Title  text-center"
                                    data-x="middle" data-hoffset=""
                                    data-y="middle" data-voffset="70"
                                    data-whitespace="normal"
                                    data-transform_idle="o:1;"
                                    data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                    data-start="1500" data-width="670" data-fontsize="60">  <span>Businesses</span>
                                </h1>
                                <p class="tp-caption News-Title  text-center"
                                   data-x="middle" data-hoffset=""
                                   data-y="middle" data-voffset="125"
                                   data-whitespace="normal"
                                   data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                   data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                   data-start="2200" data-width="870" data-fontsize="18">Ensuring better accountability on the part of advertising media outlets and your marketing teams.
                                </p>
                                <div class="tp-caption  News-Title tp-resizeme" data-x="middle"
                
                                     data-y="middle"
                                     data-voffset="200"
                                     data-hoffset="['-80','-80','-150','-200']" data-transform_idle="o:1;"
                                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                     data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                     data-start="3000"><a href="#about-us" class="btn button first scroll">Start Now</a>
                                </div>
                                <div class="tp-caption  News-Title tp-resizeme" data-x="middle"
                
                                     data-y="middle"
                                     data-voffset="200"
                                     data-hoffset="['100','100','0','0']"
                                     data-transform_idle="o:1;"
                                     data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power2.easeOut;"
                                     data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                     data-start="3000">{{-- @include('includes.pages.partials.buttons.publish-button') --}}
                                </div>
                            </li>
                
                        </ul>
                    </div>
                </div><!-- END OF SLIDER WRAPPER -->
                <!-- END REVOLUTION SLIDER -->
                </div>
            </Section>
            

            <section id="portfolio">
            
                <!--portfolio3 start -->
                <div id="portfolio3" class="mid-level-padding">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-xs-12">
                                <div class="section-top-heading">
                                    {{--<h5>Lovely Customers</h5>--}}
                                    <h2>How it works</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 wow fadeInLeft">
                                <div class="pricing-table">
                                    <div class="type">
                                        <h4>Step one</h4>
                                    </div>
                                    <div class="price">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="fa fa-user fa-2x"></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <p>Sign up to access the functionality of kokrokoo</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="packages">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Provide personal or organization details</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Make sure personal details are valid</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Upload the necessary documents</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Submit details</li>
            
                                        {{--<li><i class="fa fa-check" aria-hidden="true"></i>8 Free Forks Every Months</li>--}}
                                    </ul>
                                     {{--  @include('includes.pages.partials.buttons.public-block-btn') --}}
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeInUp" data-wow-duration="3s">
                                <div class="pricing-table black">
                                    <div class="type">
                                        <h4>Step two</h4>
                                    </div>
                                    <div class="price">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="fa fa-sign-in fa-2x"></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <p>Log into your kokrokoo account</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="packages">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Click create subscription button </li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Upload ad and select a media house.</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Schedule ad production/publishing</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Submit ad</li>
                                        {{--<li><i class="fa fa-check" aria-hidden="true"></i>Email Accounts</li>--}}
                                        {{--<li><i class="fa fa-check" aria-hidden="true"></i>8 Free Forks Every Months</li>--}}
                                    </ul>
                                  {{--    @include('includes.pages.partials.buttons.public-block-btn') --}}
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeInRight">
                                <div class="pricing-table">
                                    <div class="type">
                                        <h4>Step three</h4>
                                    </div>
                                    <div class="price">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span class="fa fa-envelope fa-2x"></span>
                                            </div>
                                            <div class="col-xs-8">
                                                <p>Selected media house will send a confirmation email/sms for approval.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="packages">
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Make payment</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Ad is reviewed by media house</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Confirmation email and sms is sent to you</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Ad is published live</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i>Track your ad anytime</li>
                                        {{--<li><i class="fa fa-check" aria-hidden="true"></i></li>--}}
                                    </ul>
                                     {{--  @include('includes.pages.partials.buttons.public-block-btn') --}}
                                </div>
                            </div>
                        </div>
            
                    </div>
                </div>
            
                <!--portfolio3 end -->
            
            </section>


        </div>

        <!-- Scripts -->
        <div class="modal-overlay"></div>

        @yield('scripts')

        
            <script src="{{asset('js/app.js')}}"></script>

       
    @include('scripts')


        </body>
</html>
