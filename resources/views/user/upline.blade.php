<?php $user = Auth::user(); $upline = $user->member->parent->user; ?>

@extends('layouts.master') 
@section('content')
@include('partials.member')
<div class="page-content">
    @include('partials.nav')
        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="">Upline</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-level-up"></span> My Upline</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">



            <div class="row">
                <div class="col-md-offset-3 col-md-6">

                    <form action="#" class="form-horizontal">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3><span class="fa fa-user text-center"></span> {{$upline->firstname}} {{$upline->surname}}</h3>

                                <div class="text-center" id="user_image">
                                    <img src="{{empty($upline->pic_url) ? URL::to('assets/images/users/no-image.jpg') : URL::to($upline->pic_url)}}" class="img-thumbnail" />
                                </div>
                            </div>
                            <div class="panel-body form-group-separated">


                                <div class="form-group">
                                    <label class="col-md-3 col-xs-5 control-label">NEO ID</label>
                                    <div class="col-md-9 col-xs-7">
                                        <input type="text" value="{{$upline->member->member_id}}" class="form-control" disabled/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-5 control-label">Email</label>
                                    <div class="col-md-9 col-xs-7">
                                        <input type="text" value="{{$upline->email}}" class="form-control" disabled/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 col-xs-5 control-label">Phone Number</label>
                                    <div class="col-md-9 col-xs-7">
                                        <input type="text" value="{{$upline->phone_no}}" class="form-control" disabled/>
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