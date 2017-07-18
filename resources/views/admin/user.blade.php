<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.admin')
<div class="page-content">
    @include('partials.nav')

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/">Admin</a></li>

            <li class="active">User Details</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-users"></span> User Details</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">



            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    @if(session('user_status'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                You have successfully {{$member->is_active ? 'activated' : 'deactivated'}} this user.
                            </div>
                        </div>
                    </div>
                    @endif
                    <form action="#" class="form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3><span class="fa fa-user text-center"></span>{{$member->firstname}} {{$member->surname}}</h3>

                                <div class="text-center" id="user_image">
                                    <img src="{{empty($member->pic_url) ? URL::to('assets/images/users/no-image.jpg') : URL::to($member->pic_url)}}" class="img-thumbnail" />
                                </div>
                            </div>
                            <div class="panel-body form-group-separated">


                                <div class="form-group">
                                    <label class="col-md-3 col-xs-5 control-label">NeoID</label>
                                    <div class="col-md-9 col-xs-7">
                                        <input type="text" value="{{$member->member->member_id}}" class="form-control" disabled/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-5 control-label">Email</label>
                                    <div class="col-md-9 col-xs-7">
                                        <input type="text" value="{{$member->email}}" class="form-control" disabled/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-5 control-label">Phone Number</label>
                                    <div class="col-md-9 col-xs-7">
                                        <input type="text" value="{{$member->phone_no}}" class="form-control" disabled/>
                                    </div>
                                </div>
                                @if($member->is_active)
                                <div class="form-group">
                                    <div class="col-md-12 col-xs-12">
                                        <a href="{{route('admin.user.status', ['id' => $member->id, 'status' => 'deactivate'])}}" class="btn btn-danger btn-block btn-rounded">Block User</a>
                                    </div>
                                </div>
                                @else
                                <div class="form-group">
                                    <div class="col-md-12 col-xs-12">
                                        <a href="{{route('admin.user.status', ['id' => $member->id, 'status' => 'activate'])}}" class="btn btn-success btn-block btn-rounded">Unblock User</a>
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>

            </div>


        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection