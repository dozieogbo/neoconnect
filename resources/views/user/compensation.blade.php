<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.member')
<div class="page-content">
    @include('partials.nav')

            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="">Compensations</a></li>
            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE TITLE -->
            <div class="page-title">
                <h2><span class="fa fa-gift"></span> My Compensations</h2>
            </div>
            <!-- END PAGE TITLE -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Compensations</h3>
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Level</th>
                                            <th>Name</th>
                                            <th>Compensation details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1?>
                                    @foreach($compensations as $c)
                                        <tr>
                                        <td>{{$c->level->number}}</td>
                                            <td>{{$c->level->name}}</td>

                                            <td>{{$c->level->rewards}}</td>
                                            @if($c->has_received)
                                            <td><button>Claim</button></td>
                                            @else
                                            <td>Claimed</td>
                                            @endif
                                        </tr>
                                    <?php $i++?>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$compensations->links()}}
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTENT -->
 @endsection