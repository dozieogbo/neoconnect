<!DOCTYPE html>
<html lang="en" class="body-full-height">

<head>
    <!-- META SECTION -->
    <title>NeoConnect</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{URL::to('img/favicon.ico')}}" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{URL::to('css/theme-default.css')}}" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>

    <div class="login-container login-v2">

        <div class="login-box animated fadeInDown">
            <div class="login-body">
                <div class="login-title"><strong>Welcome</strong>, Please login.</div>
                @if(session('block'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            Sorry. You have been blocked. Please contact support.
                        </div>
                    </div>
                </div>
                @endif
                <form action="{{route('login')}}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" autofocus />
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{route('register')}}">Create an account</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="login-footer">
                <div class="pull-left">
                    &copy; 2017 Neoconnect
                </div>
                <div class="pull-right">
                    <a href="#">About</a> |
                    <a href="#">Contact Us</a>
                </div>
            </div>
        </div>

    </div>
    <!-- START PLUGINS -->
    <script type="text/javascript" src="{{URL::to('js/plugins/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/jquery/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- END PLUGINS -->
</body>

</html>

