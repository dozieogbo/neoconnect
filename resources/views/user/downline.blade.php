<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.member')
<div class="page-content">
    @include('partials.nav')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="">Downlines</a></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-level-down"></span> My Downlines</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">



        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Downlines</h3>
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th>Upline</th>
                                    <th>Level</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $i = 1?>
                                @foreach($downlines as $d)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$d->user->firstname}}</td>
                                    <td>{{$d->user->surname}}</td>
                                    <td>{{$d->user->email}}</td>
                                    <td>{{$d->user->phone_no}}</td>
                                    <td>{{$d->parent->user->firstname}}</td>
                                    <td>{{$d->level->number}}</td>
                                </tr>
                                <?php $i++ ?>
                                @endforeach
                            </tbody>
                            
                        </table>
                        {{ $downlines->links() }}
                    </div>
                </div>
            </div>

        </div>


    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@endsection