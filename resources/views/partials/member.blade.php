<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="index.html">Neoconnect</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{$user->pic_url == null ? URL::to('assets/images/users/no-image.jpg') : URL::to($user->pic_url)}}" alt="{{$user->firstname}}" />
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{empty($user->pic_url) ? URL::to('assets/images/users/no-image.jpg') : URL::to($user->pic_url)}}" alt="{{$user->firstname}}" />
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{$user->firstname}} {{$user->surname}}</div>
                    <div class="profile-data-title">{{$user->member->level->name}}</div>
                    <div class="profile-data-title"><strong>{{$user->member->member_id}}</strong></div>
                    <!-- Put the persons level Here -->
                </div>
                <div class="profile-controls">
                    <a href="{{route('user.profile')}}" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <!--Links to about person Page -->
                    <a href="{{route('user.downline.create')}}" class="profile-control-right"><span class="fa fa-registered"></span></a>
                    <!--Links to about Register Person By Person page Page -->
                </div>
            </div>
        </li>

        <li class="">
            <a href="{{route('user.dashboard')}}"><span class="fa fa-home"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li class="">
            <a href="{{route('user.profile')}}"><span class="fa fa-info-circle"></span> <span class="xn-text">Profile</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Downlines</span></a>
            <ul>
                <li><a href="{{route('user.downlines')}}"><span class="fa fa-user"></span> My Downlines</a></li>
                <li><a href="{{route('user.downlines.create')}}"><span class="fa fa-registered"></span> New User</a></li>
            </ul>
        </li>

    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->