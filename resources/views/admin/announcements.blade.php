<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.admin')
<div class="page-content">
    @include('partials.nav')
    <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="">Announcements</a></li>
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
                    <div class="panel-heading">
                        <a href="{{route('admin.announcements.create')}}" class="btn btn-primary pull-right">Post Announcement</a>
                    </div>
                    <div class="panel-body">
                        @if(session('status'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-{{(session('status')) ? 'success' : 'danger'}}" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="80%">Content</th>
                                        <th width="20%">Date Posted</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($announcements as $ann)
                                    <tr>
                                        <td>{{$ann->content}}</td>
                                        <td>{{date_format($ann->created_at,"jS M, Y H:ia")}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$announcements->links()}}
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection