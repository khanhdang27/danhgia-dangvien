<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">

{{--                <!-- Dark Logo icon -->--}}
{{--                <img width="30%"--}}
{{--                     src="https://s3-ap-southeast-1.amazonaws.com/homepage-media/wp-content/uploads/2019/11/06160433/laravel-logo_s.png"--}}
{{--                     alt="homepage" class="dark-logo"/>--}}
{{--                <!-- Light Logo icon -->--}}
{{--                <img width="30%"--}}
{{--                     src="https://s3-ap-southeast-1.amazonaws.com/homepage-media/wp-content/uploads/2019/11/06160433/laravel-logo_s.png"--}}
{{--                     alt="homepage" class="light-logo"/>--}}
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                       href="javascript:void(0)">
                        <i class="icon-menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">
                            {{ auth('admin')->user()->name }} <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <div class="dropdown-divider"></div>
                        <a href="{{ route("admin.get.logout") }}" class="dropdown-item"><i class="fa fa-power-off"></i> Đăng xuất</a>
                    </div>
                </li>
{{--                <li class="nav-item right-side-toggle"><a class="nav-link  waves-effect waves-light"--}}
{{--                                                          href="javascript:void(0)"><i class="ti-settings"></i></a></li>--}}
            </ul>
        </div>
    </nav>
</header>
