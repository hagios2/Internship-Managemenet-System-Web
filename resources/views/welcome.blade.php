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

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Styles -->

    @yield('styles')
    
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- loader start -->
        @stack('loader')
    <!-- loader end -->
        <body>

        <div id="app">
          

            @yield('content')

            <nav class="navbar navbar-fixed-top yellow">
                
                <div class="container-fluid">
       
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>
                    </div>
            
                    <div class="container">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse  ">
                            
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="#Home" class="scroll">Home</a></li>
                                <li><a href="#about-us" class="scroll">About</a></li>
                                <li><a href="#services" class="scroll">Services</a></li>
                                {{--<li><a href="#portfolio" class="scroll">Portfolio</a></li>--}}
                                <li><a href="#portfolio" class="scroll">How it works</a></li>
                                <li><a href="#contact-us" class="scroll">Contact Us</a></li>
                                 @auth
                                    <li><a href="{{route('dashboard')}}"  class="btn button  pull-right" role="button">Dashboard</a></li>  
                                 @endauth
                                   
                                @guest
                                   
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" style="color: #0c0c0c">Personal</a></li>
                                                <li><a href="#" style="color: #0c0c0c">Organisation</a></li>
                                                <li><a href="#" style="color: #0c0c0c">Media house</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> <b>Log in</b></a></li>
                                @endguest
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
            
            
                </div>
            </nav>
            

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


        </body>
</html>
