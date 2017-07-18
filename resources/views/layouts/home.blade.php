<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Neo Connect</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- END META SECTION -->

    <link rel="stylesheet" type="text/css" href="{{URL::to('css/revolution-slider/extralayers.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/revolution-slider/settings.css')}}" media="screen" />

    <link rel="stylesheet" type="text/css" href="{{URL::to('css/styles.css')}}" media="screen" />

</head>

<body>
    <!-- page container -->
    <div class="page-container">

        <!-- page header -->
        <div class="page-header">

            <!-- page header holder -->
            <div class="page-header-holder">

                <!-- page logo -->
                <div class="logo">
                    <a href="{{route('home')}}">Neoconnect : Stresslessly connecting people</a>
                </div>
                <!-- ./page logo -->


                <!-- nav mobile bars -->
                <div class="navigation-toggle">
                    <div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
                </div>
                <!-- ./nav mobile bars -->

                <!-- navigation -->
                <ul class="navigation">
                    <li class="{{$active == 'home' ? 'active' : ''}}">
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="{{$active == 'about' ? 'active' : ''}}">
                        <a href="{{route('about')}}">About us</a>
                    </li>
                    <li class="{{$active == 'how' ? 'active' : ''}}">
                        <a href="{{route('how')}}">How it works</a>
                    </li>
                    <li class="{{$active == 'contact' ? 'active' : ''}}">
                        <a href="{{route('contact')}}">Contact us</a>
                    </li>
                    @if(!Auth::check())
                    <li>
                        <a href="{{route('login')}}">Login</a>
                    </li>
                    <li>
                        <a href="{{route('register')}}">Sign up</a>
                    </li>
                    @else
                    <li>
                        <a href="{{route('home')}}">Dashboard</a>
                    </li>
                    @endif
                </ul>
                <!-- ./navigation -->


            </div>
            <!-- ./page header holder -->

        </div>
        <!-- ./page header -->

        @yield('content')
        
        <!-- page footer -->
        <div class="page-footer">

            <!-- page footer wrap -->
            <div class="page-footer-wrap bg-dark-gray">
                <!-- page footer holder -->
                <div class="page-footer-holder page-footer-holder-main">

                    <div class="row">

                        <!-- about -->
                        <div class="col-md-3">
                            <h3>Membership</h3>
                            <p>Join this innovative team by filling a registration form with a membership fee of N5,500. Connect with your neighbours, friends and families to continue enjoying long-lasting benefits.
                            </p>
                        </div>
                        <!-- ./about -->

                        <!-- quick links -->
                        <div class="col-md-3">
                            <h3>Quick links</h3>

                            <div class="list-links">
                                <a href="#">Home</a>
                                <a href="#">About us</a>
                                <a href="#">How it works</a>
                                <a href="#">Contact us</a>
                            </div>
                        </div>
                        <!-- ./quick links -->

                        <!-- recent tweets -->


                        <div class="col-md-3">
                            <h3>Phone</h3>

                            <div class="footer-contacts">
                                <div class="fc-row">
                                    <span class="fa fa-phone"></span> 08091177339
                                </div>
                                <div class="fc-row">
                                    <span class="fa fa-phone"></span> 08035764707
                                </div>
                                <div class="fc-row">
                                    <span class="fa fa-phone"></span> 08027507712
                                </div>
                            </div>
                        </div>


                        <!-- ./recent tweets -->

                        <!-- contacts -->
                        <div class="col-md-3">
                            <h3>Contacts</h3>

                            <div class="footer-contacts">
                                <div class="fc-row">
                                    <span class="fa fa-home"></span> Lagos Nigeria
                                </div>

                                <div class="fc-row">
                                    <span class="fa fa-envelope"></span>
                                    <strong>Support</strong><br>
                                    <a href="mailto:#">info@neoconnect.net</a>
                                </div>
                            </div>
                        </div>
                        <!-- ./contacts -->

                    </div>

                </div>
                <!-- ./page footer holder -->
            </div>
            <!-- ./page footer wrap -->

            <!-- page footer wrap -->
            <div class="page-footer-wrap bg-darken-gray">
                <!-- page footer holder -->
                <div class="page-footer-holder">

                    <!-- copyright -->
                    <div class="copyright">
                        &copy; 2017 Neoconnect - All Rights Reserved
                    </div>
                    <!-- ./copyright -->

                    <!-- social links -->
                    <div class="social-links">
                        <a href="#"><span class="fa fa-twitter"></span></a>
                    </div>
                    <!-- ./social links -->

                </div>
                <!-- ./page footer holder -->
            </div>
            <!-- ./page footer wrap -->

        </div>
        <!-- ./page footer -->

    </div>
    <!-- ./page container -->

    <!-- page scripts -->
    <script type="text/javascript" src="{{URL::to('js/plugins/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/bootstrap/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::to('js/plugins/mixitup/jquery.mixitup.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/appear/jquery.appear.js')}}"></script>

    <script type="text/javascript" src="{{URL::to('js/plugins/revolution-slider/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/revolution-slider/jquery.themepunch.revolution.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::to('js/actions.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/slider.js')}}"></script>
    <!-- ./page scripts -->
</body>

</html>