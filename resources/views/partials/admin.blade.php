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
            <a href="{{route('admin.dashboard')}}"><span class="fa fa-home"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Users</span></a>
            <ul>
                <li><a href="{{route('admin.users')}}"><span class="fa fa-eye"></span> View All</a></li>
                <li><a href="{{route('admin.users.create')}}"><span class="fa fa-plus"></span> New User</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-newspaper-o"></span> <span class="xn-text">Announcements</span></a>
            <ul>
                <li><a href="{{route('admin.announcements')}}"><span class="fa fa-eye"></span> View All</a></li>
                <li><a href="{{route('admin.announcements.create')}}"><span class="fa fa-plus"></span> New Announcement</a></li>
            </ul>
        </li>

    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->