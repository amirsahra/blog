<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <ul class="navbar-nav flex-column">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('panel.home')}}" >
                        <span class="feather-icon"><i data-feather="activity"></i></span>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('panel.profile.index')}}" >
                        <span class="feather-icon"><i data-feather="zap"></i></span>
                        <span class="nav-link-text">Profile</span>
                    </a>
                </li>
                @if(Auth::user()->hasRole('super_admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('panel.logs.index')}}" >
                        <span class="feather-icon"><i data-feather="zap"></i></span>
                        <span class="nav-link-text">Logs Activity</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->hasRole('super_admin'))
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#auth_drp">
                        <span class="feather-icon"><i data-feather="zap"></i></span>
                        <span class="nav-link-text">Users</span>
                    </a>
                    <ul id="auth_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('panel.users.index')}}">List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('panel.users.report.index')}}">Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('panel.users.report.chart')}}">Line chart</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->hasPermissionTo('read_province'))
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#region_drp">
                        <span class="feather-icon"><i data-feather="zap"></i></span>
                        <span class="nav-link-text">Region</span>
                    </a>
                    <ul id="region_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('panel.region.province.index')}}">Province</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('panel.region.city.index')}}">City</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('panel.category.index')}}">
                        <span class="feather-icon"><i data-feather="zap"></i></span>
                        <span class="nav-link-text">Category</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#post_drp">
                        <span class="feather-icon"><i data-feather="zap"></i></span>
                        <span class="nav-link-text">Post</span>
                    </a>
                    <ul id="post_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('panel.post.index')}}">Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('panel.post.create')}}">New Post</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
