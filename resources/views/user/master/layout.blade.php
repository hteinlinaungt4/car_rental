
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Car Rental Portal</title>
    <!--Bootstrap -->
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/owl.transitions.css') }}" type="text/css">
    <link href="{{ asset('user/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/bootstrap-slider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" id="switcher-css" type="text/css" href="{{ asset('user/switcher/css/switcher.css') }}"
        media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('user/switcher/css/red.css') }}" title="red"
        media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('user/switcher/css/orange.css') }}" title="orange"
        media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('user/switcher/css/blue.css') }}" title="blue"
        media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('user/switcher/css/pink.css') }}" title="pink"
        media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('user/switcher/css/green.css') }}" title="green"
        media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('user/switcher/css/purple.css') }}" title="purple"
        media="all" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('user/images/favicon-icon/apple-touch-icon-144-precomposed.png') }}">

    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('user/images/favicon-icon/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('user/images/favicon-icon/apple-touch-icon-57-precomposed.png') }}">
    <link rel="shortcut icon" href="{{ asset('user/images/favicon-icon/apple-touch-icon-57-precomposed.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>

<body>

    <header>
        <div class="default-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-2">
                        <div class="logo"> <a href="{{route('user.dashboard')}}"><img src="{{asset('user/images/logg.png')}}" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-10">
                        <div class="header_info">
                            <div class="header_widgets">
                                <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                                <p class="uppercase_text">For Support Mail us : </p>
                                <a href="mailto:info@example.com">myemail@gmail.com</a>
                            </div>
                            <div class="header_widgets">
                                <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                                <p class="uppercase_text">Service Helpline Call Us: </p>
                                <a href="tel:61-1234-5678-09">+95xxxxxx</a>
                            </div>
                            <div class="social-follow">
                                <ul>
                                    <li><a href="https://facebook.com/"><i class="fa fa-facebook-square"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="https://twitter.com/"><i class="fa fa-twitter-square"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin-square"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="https://www.google.com/"><i class="fa fa-google-plus-square"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav id="navigation_bar" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle
                            navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> </button>
                </div>
                <div class="header_wrap">
                    @if (!Auth::check())
                    <div class="user_login">
                        <ul>
                            <li > <a href="{{route('login')}}"  aria-haspopup="true"
                                    aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Login
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="user_login">
                        <ul>
                            <li > <a href="{{route('register')}}"  aria-haspopup="true"
                                    aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> Register
                                </a>
                            </li>
                        </ul>
                    </div>
                    @else
                        <div class="user_login">
                            <ul>
                                <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> {{Auth::user()->name}}
                                        <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('myprofile')}}">Profile Settings</a></li>
                                        <li><a href="{{route('userpassword#changepage')}}">Update Password</a></li>
                                        <li><a href="{{route('mybook')}}">My Booking</a></li>
                                        <li><a href="{{route('test.index')}}">Post a Testimonial</a></li>
                                        <li><a href="{{route('mytest')}}">My Testimonial</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="user_login">
                            <ul>
                                <li >
                                    <form  method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="cu"><i class="fa fa-user-circle " aria-hidden="true"></i> Logout</button>
                                    </form>

                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('user.dashboard')}}">Home</a> </li>

                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navigation end -->

    </header>



    <!-- Banners -->
    @section('banner')
        <section id="banner" class="banner-section">
            <div class="container">
                <div class="div_zindex">
                    <div class="row">
                        <div class="col-md-5 col-md-push-7">
                            <div class="banner_content">
                                <h1>Find the right car for you.</h1>
                                <p>We have more than a thousand cars for you to choose. </p>
                                <a href="#" class="btn">Read More <span class="angle_arrow"><i
                                            class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- /Banners -->
    @show

    <!-- Resent Cat-->
    @section('resent')
        <section class="section-padding gray-bg">
            <div class="container">
                <div class="section-header text-center">
                    <h2>Find the Best <span>CarForYou</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour, or randomised words which don't look even slightly
                        believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                        anything embarrassing hidden in the middle of text.</p>
                </div>
                <div class="row">

                    <!-- Nav tabs -->
                    <div class="recent-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#resentnewcar" role="tab"
                                    data-toggle="tab">New Car</a></li>
                        </ul>
                    </div>
        @show
                    <!-- Recently Listed New Cars -->

                    @yield('content');
                </div>
        </section>


    <!-- /Resent Cat -->
    @section('facts')
    <!-- Fun Facts-->
    <section class="fun-facts-section">
        <div class="container div_zindex">
            <div class="row">
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-calendar" aria-hidden="true"></i>40+</h2>
                            <p>Years In Business</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-car" aria-hidden="true"></i>1200+</h2>
                            <p>New Cars For Sale</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-car" aria-hidden="true"></i>1000+</h2>
                            <p>Used Cars For Sale</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6 col-sm-3">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>600+</h2>
                            <p>Satisfied Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Fun Facts-->


    <!--Testimonial -->
    <section class="section-padding testimonial-section parallex-bg">
        <div class="container div_zindex">
            <div class="section-header white-text text-center">
                <h2>Our Satisfied <span>Customers</span></h2>
            </div>
            <div class="row">
                <div id="testimonial-slider">
                    <div class="testimonial-m">
                        <div class="testimonial-img"> <img src="{{asset('user/images/cat-profile.png')}}" alt="" />
                        </div>
                        <div class="testimonial-content">
                            <div class="testimonial-heading">
                                <h5>Hello</h5>
                                <p>Nay </p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-m">
                        <div class="testimonial-img"> <img src="{{asset('user/images/cat-profile.png')}}" alt="" />
                        </div>
                        <div class="testimonial-content">
                            <div class="testimonial-heading">
                                <h5>Hello</h5>
                                <p>Nay </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Testimonial-->
    @show



    <!--Back to top-->
    <div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
    </div>
    <!--/Back to top-->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <h6>About Us</h6>
                        <ul>


                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                            <li><a href="{{route('user.dashboard')}}">Home</a></li>
                            <!-- <li><a href="admin/"><b>Admin Login</b></a></li> -->
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h6>Subscribe Newsletter</h6>
                        <div class="newsletter-form">
                            <form method="post">
                                <div class="form-group">
                                    <input type="email" name="subscriberemail"
                                        class="form-control newsletter-input" required
                                        placeholder="Enter Email Address" />
                                </div>
                                <button type="submit" name="emailsubscibe" class="btn btn-block">Subscribe <span
                                        class="angle_arrow"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></span></button>
                            </form>
                            <p class="subscribed-text">*We send great deals and latest auto news to our subscribed
                                users very week.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-6 text-right">
                        <div class="footer_widget">
                            <p>Connect with Us:</p>
                            <ul>
                                <li><a href="https://facebook.com/"><i class="fa fa-facebook-square"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter-square"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin-square"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="https://www.google.com/"><i class="fa fa-google-plus-square"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 col-md-pull-6">
                        <p class="copy-right">Copyright &copy; 2024 Car Rental System. Brought To You By <a
                                href="https://github.com/niteesh-bhat/carrental">Niteesh,Rohan and Team</a></p>
                    </div> --}}
                </div>
            </div>
        </div>
    </footer>




    <!-- Scripts -->
    <script src="{{ asset('user/js/jquery.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/interface.js') }}"></script>
    <!--Switcher-->
    <script src="{{ asset('user/switcher/js/switcher.js') }}"></script>
    <!--bootstrap-slider-JS-->
    <script src="{{ asset('user/js/bootstrap-slider.min.js') }}"></script>
    <!--Slider-JS-->
    <script src="{{ asset('user/js/slick.min.js') }}"></script>
    <script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@yield('script')
</body>


</html>
