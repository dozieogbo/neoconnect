<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.admin')
<div class="page-content">
    @include('partials.nav')
    <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('admin.announcements')}}">Announcements</a></li>
            <li><a href="">New</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-user"></span> Announcements</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">



            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(isset($status))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    Announcement created successfully
                                </div>
                            </div>
                        </div>
                        @endif
                        <form action="{{route('admin.announcements.create')}}" class="form-horizontal" method="post">
                        {{csrf_field()}}
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="control-label-lg">Content</label>
                                <textarea name="content" id="content" rows="30" cols="1" required class="form-control" placeholder="Write your announcement content here" value="{{old('content')}}">
                                </textarea>
                                @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary pull-right">Save</button>
                        </form>
                    </div>
                </div>

            </div>


        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection