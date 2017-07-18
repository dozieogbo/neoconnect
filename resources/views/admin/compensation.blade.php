<?php $user = Auth::user(); ?>

@extends('layouts.master') 
@section('content')
@include('partials.admin')
<div class="page-content">
    @include('partials.nav')

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="">Set Compensation</a></li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h2><span class="fa fa-gift"></span> Set Compensations</h2>
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
                        @if(session('status'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-{{(session('status')) ? 'success' : 'danger'}}" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    {{(session('status')) ? 'You have successfully modified compensation' : 'An error occured. Please try again later or contact support if issue persists.'}}
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Level</th>
                                        <th>Compensation details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($levels as $l)
                                    <tr>
                                        <td>{{$l->name}}</td>
                                        <td>
                                            <span class="hidden id">{{$l->id}}</span>
                                            <span class="hidden old_reward">{{$l->rewards}}</span>
                                            <input type="text" value="{{$l->rewards}}" class="form-control" />
                                        </td>
                                        <td><button class="updateBtn btn btn-primary" disabled>Set</button></td>
                                    </tr>
                                    @endforeach

                                    <form action="{{route('admin.compensations')}}" id="comp-form" class="hidden" method="post">
                                        {{csrf_field()}}
                                        <input type="text" name="level_id" id="level_id" class="hidden"/>
                                        <input type="text" name="compensation" id="compensation" class="hidden"/>
                                    </form>
                                </tbody>
                            </table>
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
            $('.updateBtn').click(function(){
                var compensation = $(this).parents('tr').find('input').val();
                var id = $(this).parents('tr').find('span').text();

                if(compensation && id){
                    $('#level_id').val(id);
                    $('#compensation').val(compensation);
                    $('#comp-form').submit();
                }
                
            });

            $('.form-control').on('input', function(){
                setButton(this);
            });

            $('.form-control').on('focus', function(){
                setButton(this);
            });

            function setButton(input){
                var old_value = $(input).parent().find('span.old_reward').text();
                var new_value = $(input).val();
                var button = $(input).parents('tr').find('button');
                if(new_value != null && new_value.trim() != "" && new_value.trim() != old_value)
                    button.attr('disabled', false);
                else
                    button.attr('disabled', true);
            }
        });
    </script>
@endsection