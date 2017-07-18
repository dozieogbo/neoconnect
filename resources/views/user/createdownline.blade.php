<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.member')
<div class="page-content">
    @include('partials.nav')
    <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('user.downlines')}}">Downlines</a></li>
                <li><a href="">New</a></li>
            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE TITLE -->
            <div class="page-title">
                <h2><span class="fa fa-users"></span>REGISTER NEW DOWNLINE</h2>
            </div>
            <!-- END PAGE TITLE -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <div class="row">

                    <div class="col-md-offset-3 col-md-6 col-sm-8 col-xs-7">

                    @if(isset($status))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-{{($status == 'success') ? 'success' : 'danger'}}" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                {{($status == 'success') ? 'Your downline has been added successfully.' : 'Sorry. An error occured. Please, try again later or contact support.'}}
                            </div>
                        </div>
                    </div>
                    @endif

                        <form action="{{route('user.downline.create')}}" class="form-horizontal" method="post">
                        {{csrf_field()}}
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Person Profile</h3>
                                    <p>This is the details of the person you want to register as your downline. If your immediate downlo=ines are complete, the person will spill over to one of your downlines, still growing your network</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">First Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required/>
                                            @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Surname</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required/>
                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Email</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required/>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Password</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="password" class="form-control" placeholder="Password" name="password" />
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Re-Password</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="password" class="form-control" name="password_confirmation"/>
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                                        <label class="col-md-3 col-xs-5 control-label">Phone number</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" required />
                                            @if ($errors->has('phone_no'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">City</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">State</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Country</label>
                                        <div class="col-md-9 col-xs-7">
                                            <select class="form-control select" data-live-search="true">
                                                <option>Country</option>
                                                <option>Nigeria</option>
                                                <option>Ghana</option>
                                                <option>South Africa</option>
                                                <option>USA</option>
                                                <option>UK</option>                
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button type="submit" class="btn btn-primary btn-rounded pull-right">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT WRAPPER -->
            </div>
@endsection