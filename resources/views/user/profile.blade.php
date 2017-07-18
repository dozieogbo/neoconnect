<?php $user = Auth::user() ?>
@extends('layouts.master')
@section('content')
@include('partials.member')
<div class="page-content">
@include('partials.nav')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{route('home')}}">Home</a></li>
    <li><a href="">Edit Profile</a></li>

</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">
    <h2><span class="fa fa-cogs"></span> Edit Profile</h2>
</div>
<!-- END PAGE TITLE -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <strong>Important!</strong> This page helps you modify your profile information
            </div>
        </div>
    </div>

    @if(isset($profile_success))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                Your profile was updated successfully.
            </div>
        </div>
    </div>
    @endif

    @if(session('pwd_status'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-{{session('pwd_status') == 'success' ? 'success' : 'danger'}}" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {{session('pwd_status') == 'success' ? 'Your password reset was successful.' : 'Sorry. Incorrect password.'}}
            </div>
        </div>
    </div>
    @endif

    
    @if (session('file_error'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-error" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {{session('file_error')}}</a>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-5">

            <form action="#" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><span class="fa fa-user"></span> {{$user->firstname}} {{$user->surname}}</h3>
                        <div class="text-center" id="user_image">
                            <img src="{{empty($user->pic_url) ? URL::to('assets/images/users/no-image.jpg') : URL::to($user->pic_url)}}" class="img-thumbnail" />
                        </div>
                    </div>
                    <div class="panel-body form-group-separated">

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12">
                                <a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_photo">Change Photo</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">NeoID</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="{{$user->member->member_id}}" class="form-control" disabled/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">E-mail</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="{{$user->email}}" class="form-control" disabled/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">Password</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="**********" class="form-control" disabled/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12">
                                <a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Change password</a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-8 col-sm-8 col-xs-7">

            <form action="{{ route('user.profile') }}" method="post" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><span class="fa fa-pencil"></span> Profile</h3>
                        <p>This information lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus, est quis molestie tincidunt, elit arcu faucibus erat.</p>
                    </div>
                    {{ csrf_field() }}
                    <div class="panel-body form-group-separated">
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-xs-5 control-label">First Name</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="{{$user->firstname}}" name="firstname" class="form-control" />
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
                                <input type="text" value="{{$user->surname}}" name="lastname" class="form-control" />
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
                                <input type="text" value="{{$user->email}}" name="email" class="form-control" />
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone_no') ? ' has-error' : '' }}">
                            <label class="col-md-3 col-xs-5 control-label">Phone Number</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="{{ $user->phone_no }}" class="form-control" name="phone_no" />
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
                                <input type="text" value="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">State</label>
                            <div class="col-md-9 col-xs-7">
                                <input type="text" value="Doe" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-5 control-label">LGA</label>
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
@endsection
        
@section('modals')
    <div class="modal animated fadeIn" id="modal_change_photo" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="smallModalHead">Change photo</h4>
                </div>
                 <form id="cp_crop" method="post" action="assets/crop_image.php">
                    <div class="modal-body">
                        <div class="text-center" id="cp_target">Use form below to upload file. Only .jpg or .png files. Recommended size (200 x 200)</div>
                        <input type="hidden" name="cp_img_path" id="cp_img_path" />
                        <input type="hidden" name="ic_x" id="ic_x" />
                        <input type="hidden" name="ic_y" id="ic_y" />
                        <input type="hidden" name="ic_w" id="ic_w" />
                        <input type="hidden" name="ic_h" id="ic_h" />
                    </div>
                </form> 
                <form id="cp_upload" action="/account/photo" method="post" enctype="multipart/form-data">
                
                    <div class="modal-body form-horizontal form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 control-label">New Photo</label>
                            <div class="col-md-4">
                                <input type="file" class="fileinput btn-info" name="file" id="cp_photo" data-filename-placement="inside" title="Select file" onchange="handleImage()" accept="image/*" required />
                            </div>
                        </div>
                        <?php echo csrf_field() ?>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" onclick="document.getElementById('cp_upload').submit();" class="btn btn-success" id="cp_accept">Accept</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated fadeIn" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="smallModalHead">Change password</h4>
                </div>
                <div class="modal-body">
                    <p>Make sure you keep your password safe</p>
                </div>
                <div class="modal-body form-horizontal form-group-separated">
                    <form action="{{route('resetpassword')}}" method="post" id="pass_form">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-md-3 control-label">Old Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="old_password" />
                                @if ($errors->has('old_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">New Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" />
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Repeat New</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password_confirmation" />
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="document.getElementById('pass_form').submit();" class="btn btn-danger" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
