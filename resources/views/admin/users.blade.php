<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.admin')
<div class="page-content">
    @include('partials.nav')
    <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="">Users</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-user"></span> Users</h2>
        </div>
        <!-- END PAGE TITLE -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Enter search parameters</h3>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                            <td>
                                            <select class="form-control select" data-live-search="true" name="country" id="country">
                                                <option value="">All</option>
                                                <option>Nigeria</option>
                                                <option>Ghana</option>
                                                <option>South Africa</option>
                                                <option>USA</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control select" data-live-search="true" name="state" id="state" value="">
                                                <option value="">All</option>
                                                <option>Nigeria</option>
                                                <option>Ghana</option>
                                                <option>South Africa</option>
                                                <option>USA</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control select" data-live-search="true" name="level" id="level" value="">
                                                <option value="">All Levels</option>
                                                <option value="Neo">Neo</option>
                                                <option>Neo-Plus</option>
                                                <option>Bronze</option>
                                                <option>Silver</option>
                                                <option>Jasper</option>
                                            </select>
                                        </td>

                                        <td><button type="button" id="search-btn">Search</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('user_status'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-{{(session('user_status')) ? 'success' : 'danger'}}" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    User was successfully {{session('is_active') ? 'activated' : 'deactivated'}}.
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone number</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $m)
                                    <tr>
                                        <td>{{$m->user->firstname}}</td>
                                        <td>{{$m->user->surname}}</td>
                                        <td>{{$m->user->email}}</td>
                                        <td>{{$m->user->phone_no}}</td>
                                        <td>{{$m->level->name}}</td>
                                        <td>
                                        <a class="btn btn-xs btn-primary btn-rounded" href="{{route('admin.user', ['id' => $m->user_id])}}">View</a>
                                        @if($m->user->is_active)
                                        <a class="updateBtn btn btn-xs btn-danger btn-rounded" href="{{route('admin.user.status', ['id' => $m->user_id, 'status' => 'deactivate'])}}">Block</a>
                                        @else
                                        <a class="updateBtn btn btn-xs btn-success btn-rounded" href="{{route('admin.user.status', ['id' => $m->user_id, 'status' => 'activate'])}}">Unblock</a>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$members->appends($query)->render()}}
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
@endsection

@section('scripts')
    <script>
        $(function(){
            var state = $('#state');
            var country = $('#state');
            var level = $('#level');

            state.val('{{array_key_exists('state', $query) ? $query['state'] : ''}}');
            country.val('{{array_key_exists('country', $query) ? $query['country'] : ''}}');
            level.val('{{array_key_exists('level', $query) ? $query['level'] : ''}}');

            $('#search-btn').click(function(){
                console.log("Clicked")
                var url = '{{route('admin.users')}}';
                var params = {};

                if(state.val() != '' || country.val() != '' || level.val() != ''){
                    url = url + '?';
                    if(state.val() != '')
                        params.state = state.val();
                    if(country.val() != '')
                        params.country = country.val();
                    if(level.val() != '')
                        params.level = level.val();
                    url = url + $.param(params);
                }

                location.href = url;
            });
        });
    </script>
@endsection