<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.member')
<div class="page-content">
    @include('partials.nav')

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Dashboard</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <!-- START WIDGETS -->
        <div class="row">
            <div class="col-md-3">
            <a href="{{route('user.downline.create')}}">
                <div class="widget widget-default widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-user-plus"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">New</div>
                        <div class="widget-title">Member</div>
                        <div class="widget-subtitle">new Downline</div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-3">
                <a href="{{route('user.compensation')}}">
                    <div class="widget widget-default widget-item-icon">
                        <div class="widget-item-left">
                            <span class="fa fa-level-up"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{$user->member->level->number}}</div>
                            <div class="widget-title">My Level</div>
                            <div class="widget-subtitle">{{$user->member->level->name}}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
            <a href="{{route('user.downlines')}}">
            <div class="widget widget-default widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-user-secret"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{$downlines_count}}</div>
                        <div class="widget-title">Total Downlines</div>
                        <div class="widget-subtitle">Members</div>
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
        <!-- END WIDGETS -->

        <div class="row">
            <div class="col-md-8">

                <!-- START SALES BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Announcements</h3>
                    </div>
                    <div class="panel-body scroll" style="height: 470px;" data-bind="foreach: Announcements">
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
                            <h3> Level Progress</h3>
                        </div>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="50%">Level</th>
                                        <th width="20%">status</th>
                                        <th width="30%">Progress</th>
                                    </tr>
                                </thead>
                                <tbody data-bind="foreach: Levels">
                                    <tr>
                                        <td><strong data-bind="text: name"></strong></td>
                                        <td><span class="" data-bind="text: getStatus(percent), css: getClass(percent, 'label')"></span></td>
                                        <td>
                                            <div class="progress progress-small progress-striped active">
                                                <div class="" data-bind="css: getClass(percent, 'progress-bar'), style: {width: percent + '%'}, text: percent + '%'" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                            </div>
                                        </td>
                                    </tr>

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
@endsection

@section('scripts')
<script src="{{URL::to('js/knockout-3.4.2.js')}}"></script>
    <script>

        function DashboardVM(){
            var self = this;
            self.Levels = ko.observableArray();

            $.get("{{route('user.level.count')}}", function(data){
                self.Levels(data);
            });

            self.Announcements = ko.observableArray();
            $.get('{{route('announcement')}}', function(data){
                self.Announcements(data);
            })
        }

        function getStatus(percent){
            if(percent == 100)
                return 'Done';
            if(percent == 0)
                return 'Pending';
            else
                return 'InProgress';
        }

        function getClass(percent, baseClass){
            baseClass = baseClass + ' ' + baseClass + '-'
            if(percent == 100)
                return baseClass + 'success';
            if(percent == 0)
                return baseClass + 'warning';
            else
                return baseClass + 'info';
        }
        
        ko.applyBindings(new DashboardVM());
    </script>
@endsection