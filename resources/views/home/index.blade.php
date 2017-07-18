@extends('layouts.home')
@section('content')
    <!-- page content -->
        <div class="page-content">


            <!-- revolution slider -->
            <div class="banner-container">
                <div class="banner">

                    <ul>
                        <li data-transition="fade" data-slotamount="1" data-masterspeed="700">
                            <img src="{{URL::to('img/bk.png')}}" alt="video_typing_cover" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat">

                        </li>
                    </ul>

                </div>
            </div>


            <!-- page content wrapper -->
            <div class="page-content-wrap bg-img-1">

                <div class="divider">
                    <div class="box"><span class="fa fa-angle-down"></span></div>
                </div>

                <!-- page content holder -->
                <div class="page-content-holder">

                    <div class="row">
                        <div class="col-md-8 this-animate" data-animate="fadeInLeft">

                            <div class="block-heading block-heading-centralized">
                                <h2 class="heading-underline">Welcome to the Neo Experience</h2>
                                <div class="block-heading-text">
                                    Neo Connect is a network of friends and families, collectively enhancing their standard of living through a mutually beneficial system. Neo Connect offers amazing benefits to registered members such as (but not limited to) food items <br>•
                                    Household goods
                                    <br>• Health insurance <br>• Educational aids for children/wards • Skills acquisitions • Foreign trips for individuals and families <br>• Cars and home ownership scheme.

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 this-animate text-center" data-animate="fadeInRight">
                            <img src="assets/atlant_responsive.png" class="img-responsive-mobile" />
                        </div>
                    </div>

                </div>
                <!-- ./page content holder -->
            </div>
            <!-- ./page content wrapper -->

            <!-- page content wrapper -->
            <div class="page-content-wrap bg-texture-1 bg-dark light-elements">

                <div class="divider">
                    <div class="box"><span class="fa fa-angle-down"></span></div>
                </div>

                <!-- page content holder -->
                <div class="page-content-holder">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="text-column text-column-centralized tex-column-icon-lg this-animate" data-animate="fadeInLeft">
                                <div class="text-column-icon">
                                    <span class="fa fa-globe"></span>
                                </div>
                                <h4>Stresslessly connecting people </h4>
                                <div class="text-column-info">
                                    We provide <strong>strong</strong> platform that will connect you with great minds.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="text-column text-column-centralized tex-column-icon-lg this-animate" data-animate="fadeInUp">
                                <div class="text-column-icon">
                                    <span class="fa fa-leaf"></span>
                                </div>
                                <h4>Guaranteeing quality of life</h4>
                                <div class="text-column-info">
                                    We are determined to ensure you live a quality life.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="text-column text-column-centralized tex-column-icon-lg this-animate" data-animate="fadeInRight">
                                <div class="text-column-icon">
                                    <span class="fa fa-money"></span>
                                </div>
                                <h4>Restoring dignity of living</h4>
                                <div class="text-column-info">
                                    At Neoconnect, be belive every life should have a meaning, so we <strong>ensure that!</strong>.
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- ./page content holder -->
            </div>
            <!-- ./page content wrapper -->

            <!-- page content wrapper -->
            <div class="page-content-wrap bg-light bg-texture-1">

                <div class="divider">
                    <div class="box"><span class="fa fa-angle-down"></span></div>
                </div>

                <!-- page content holder -->
                <div class="page-content-holder">

                    <div class="quote this-animate" data-animate="fadeInDown">
                        <div class="row">
                            <div class="col-md-9">
                                <h3><strong>NEOCONNECT</strong> &mdash; Stresslessly connecting people</h3>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary btn-block btn-lg">Join Now</button>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ./page content holder -->
            </div>
            <!-- ./page content wrapper -->

            <!-- page content wrapper -->
            <div class="page-content-wrap bg-light">
                <!-- page content holder -->

                <!-- ./page content holder -->
            </div>
            <!-- ./page content wrapper -->
        </div>
        <!-- ./page content -->
@endsection