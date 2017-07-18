<!DOCTYPE html>
<html lang="en" class="body-full-height">

<head>
    <!-- META SECTION -->
    <title>Neoconnect</title>
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
                <div class="login-title text-center"><strong>Please fill the form below to create an account.</strong></div>
                <form class="form-horizontal" method="post" action="{{ route('register') }}">
                        {{ csrf_field() }}

                    <h4>Referral info</h4>
                    <div class="form-group{{ $errors->has('sponsor_id') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Referee Id" name="sponsor_id" value="{{ old('sponsor_id') }}"/>
                        </div>
                        @if ($errors->has('sponsor_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sponsor_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <h4>Personal info</h4>
                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required />

                            @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Surname" name="lastname" value="{{ old('lastname') }}" required/>
                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required/>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <h4>Login Info</h4>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" value="{{old('password')}}" name="password" />
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Re-Password" name="password_confirmation" />
                        </div>
                    </div>

                    <h4>Contact Info</h4>
                    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone_no" value="{{ old('phone_no') }}" required />
                            @if ($errors->has('phone_no'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <select class="form-control select" name="country" data-live-search="true" placeholder="Country" data-bind="options: Countries, optionsCaption: 'Select a country', optionsText: 'name', optionsValue: 'id', value: SelectedCountry" >      @if ($errors->has('country'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control" placeholder="State" data-bind="options: States, optionsCaption: 'Select a state', optionsText: 'name', optionsValue: 'id', value: SelectedState"><select/>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('lga_id') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <select class="form-control" placeholder="City" data-bind="options: LGAs, optionsCaption: 'Select an lga', optionsText: 'name', optionsValue: 'id'" name="lga_id"><select/>
                            @if ($errors->has('lga_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lga_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group push-up-30">
                        <div class="col-md-6">
                            <a href="{{route('login')}}" class="btn btn-link btn-block">Already have an account?</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger btn-block">Sign Up</button>
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
    <script src="{{URL::to('js/knockout-3.4.2.js')}}"></script>
    <script>

        function DashboardVM(){
            var self = this;
            self.Countries = ko.observableArray();
            self.SelectedCountry = ko.observable();
            self.OnCountryChange = ko.computed(function(){
                if(self.SelectedCountry() != null)
                    getStates();
            })
            $.get("{{route('country')}}", function(data){
                self.Countries(data);
            });

            self.States = ko.observableArray();
            self.SelectedState = ko.observable();
            self.OnStateChange = ko.computed(function(){
                if(self.SelectedState() != null)
                    getLGAs();
            })
            function getStates(){
                $.get('/countries/' + self.SelectedCountry() + '/states', function(data){
                    self.States(data);
                });
            }

            self.LGAs = ko.observableArray();
            function getLGAs(){
                $.get('/states/' + self.SelectedState() + '/towns', function(data){
                    self.LGAs(data);
                });
            }
        }
        
        ko.applyBindings(new DashboardVM());
    </script>
</body>

</html>