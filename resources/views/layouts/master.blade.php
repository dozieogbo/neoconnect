<?php $user = Auth::user(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>NeoConnect</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{URL::to('css/theme-default.css')}}" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">
        @yield('content')

    </div>
    <!-- END PAGE CONTAINER -->

    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                <div class="mb-content">
                    <p>Are you sure you want to log out?</p>
                    <p>Press No if you want to continue work. Press Yes to logout.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-success btn-lg">Yes</a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->

    <!-- START MODALS -->
    @yield('modals')
    <!-- END MODALS -->

    <!-- START SCRIPTS -->
    <!-- START PLUGINS -->
    <script type="text/javascript" src="{{URL::to('js/plugins/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/jquery/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- END PLUGINS -->

    <!-- START THIS PAGE PLUGINS-->
    <script type='text/javascript' src="{{URL::to('js/plugins/icheck/icheck.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>

    <script type="text/javascript" src="{{URL::to('js/plugins/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- END THIS PAGE PLUGINS-->

    <!-- START TEMPLATE -->
     {{--  <script type="text/javascript" src="{{URL::to('js/settings.js')}}"></script>  --}}

    <script type="text/javascript" src="{{URL::to('js/plugins.js')}}"></script> 
    <script type="text/javascript" src="{{URL::to('js/actions.js')}}"></script>

    {{--  <script type="text/javascript" src="{{URL::to('js/demo_dashboard.js')}}"></script>  --}}
    @yield('scripts')
    <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
</body>

</html>