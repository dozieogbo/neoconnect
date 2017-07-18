<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.admin')
<div class="page-content">
    @include('partials.nav')

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Admin Dashboard</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <!-- START WIDGETS -->
            <div class="row">
                <div class="col-md-3">
                <a href="{{route('admin.users.create')}}">
                    <div class="widget widget-default widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-user-plus"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">Add</div>
                            <div class="widget-title">New</div>
                            <div class="widget-subtitle">Member</div>
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('admin.users')}}">
                        <div class="widget widget-default widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-user-secret"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">{{$users_count}}</div>
                                <div class="widget-title">Total Users</div>
                                <div class="widget-subtitle">(Members)</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="{{route('admin.announcements.create')}}">
                        <div class="widget widget-default widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-newspaper-o"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">Set</div>
                                <div class="widget-title">Announcement</div>
                                <div class="widget-subtitle">(News)</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">

                    <!-- START WIDGET CLOCK -->
                    <div class="widget widget-danger widget-padding-sm">
                        <div class="widget-subtitle">Time</div>
                        <div class="widget-big-int plugin-clock">00:00</div>
                        <div class="widget-subtitle plugin-date">Loading...</div>


                    </div>
                    <!-- END WIDGET CLOCK -->

                </div>
            </div>
            {{--  <div class="row">
                <div class="col-md-3">
                <a href="">
                    <div class="widget widget-default widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-newspaper-o"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">Set</div>
                            <div class="widget-title">Announcement</div>
                            <div class="widget-subtitle">(News)</div>
                        </div>
                    </div>
                </a>
                    
                </div>
                <div class="col-md-3">
                    <a href="">
                        <div class="widget widget-default widget-item-icon">
                            <div class="widget-item-left">
                                <span class="fa fa-gift"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">Set</div>
                                <div class="widget-title">Compensation</div>
                                <div class="widget-subtitle">per Level</div>
                            </div>
                        </div>
                    </a>
                    
                </div>
                <div class="col-md-3">
                <a href="">
                    <div class="widget widget-default widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-user-secret"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">21</div>
                            <div class="widget-title">Total Downlines</div>
                            <div class="widget-subtitle">Members</div>
                        </div>
                    </div>
                </a>
                    
                </div>
            </div>  --}}
            <!-- END WIDGETS -->

            <div class="row">
                <div class="col-md-8">

                    <!-- START SALES BLOCK -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Announcements</h3>
                        </div>
                        <div class="panel-body scroll" style="height: 470px;"  data-bind="foreach: Announcements">
                            <p data-bind="text: content"></p>
                        </div>
                    </div>
                    <!-- END SALES BLOCK -->

                </div>
                <div class="col-md-4">

                    <!-- START PROJECTS BLOCK -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title-box">
                                <h3> Member Level Progress</h3>
                            </div>
                        </div>
                        <div class="panel-body panel-body-table">

                            <div class="table-responsive">
                                <table class="table table-condensed table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="50%">Level</th>
                                            <th width="20%">No of users</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($levels as $l)
                                        <tr>
                                            <td><strong>{{$l->name}}</strong></td>
                                            <td><span class="label label-info">{{$l->members_count}}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- END PROJECTS BLOCK -->

                </div>
            </div>


        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection

@section('scripts')
<script src="{{URL::to('js/knockout-3.4.2.js')}}"></script>
    <script>

        function DashboardVM(){
            var self = this;

            self.Announcements = ko.observableArray();
            $.get('{{route('announcement')}}', function(data){
                self.Announcements(data);
            })
        }
        
        ko.applyBindings(new DashboardVM());
    </script>
@endsection