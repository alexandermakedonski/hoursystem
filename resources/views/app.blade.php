<!DOCTYPE html>
<html>
<head>

    <!-- Title -->
    <title>СТУДИО ШИК</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="admin,dashboard"/>
    <meta name="author" content="Steelcoders"/>

    @include('partials.css')

    @yield('styles')


</head>
<body class="page-header-fixed compact-menu page-horizontal-bar">
<div class="overlay"></div>


<!-- Search Form -->
<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner container">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href={{ URL::to('/home') }} class="logo-text"><span>Студио ШИК</span></a>
            </div>
            <!-- Logo Box -->
            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic"><i class="fa fa-bars"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic"><i class="fa fa-diamond"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic"><i class="fa fa-expand"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <i class="fa fa-cogs"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-md dropdown-list theme-settings" role="menu">
                                <li class="li-group">
                                    <ul class="list-unstyled">
                                        <li class="no-link" role="presentation">
                                            Fixed Header
                                            <div class="ios-switch pull-right switch-md">
                                                <input type="checkbox" class="js-switch pull-right fixed-header-check" checked>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="li-group">
                                    <ul class="list-unstyled">
                                        <li class="no-link" role="presentation">
                                            Fixed Sidebar
                                            <div class="ios-switch pull-right switch-md">
                                                <input type="checkbox" class="js-switch pull-right fixed-sidebar-check">
                                            </div>
                                        </li>
                                        <li class="no-link" role="presentation">
                                            Toggle Sidebar
                                            <div class="ios-switch pull-right switch-md">
                                                <input type="checkbox" class="js-switch pull-right toggle-sidebar-check">
                                            </div>
                                        </li>
                                        <li class="no-link" role="presentation">
                                            Compact Menu
                                            <div class="ios-switch pull-right switch-md">
                                                <input type="checkbox" class="js-switch pull-right compact-menu-check" checked>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="no-link"><button class="btn btn-default reset-options">Reset Options</button></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-success pull-right">3</span></a>
                            <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                <li><p class="drop-title">You have 3 pending tasks !</p></li>
                                <li class="dropdown-menu-list slimscroll tasks">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="#">
                                                <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                                <span class="badge badge-roundless badge-default pull-right">1min ago</span>
                                                <p class="task-details">New user registered.</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="task-icon badge badge-danger"><i class="icon-energy"></i></div>
                                                <span class="badge badge-roundless badge-default pull-right">24min ago</span>
                                                <p class="task-details">Database error.</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="task-icon badge badge-info"><i class="icon-heart"></i></div>
                                                <span class="badge badge-roundless badge-default pull-right">1h ago</span>
                                                <p class="task-details">Reached 24k likes</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <span class="user-name">{{ \Auth::user()->name }}<i class="fa fa-angle-down"></i></span>
                                <img class="img-circle avatar" src={{URL::to('/avatar/'.\Hashids::encode(Auth::user()->id,rand(0,100)))}} width="40" height="40" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-list" role="menu">
                                <li role="presentation"><a href="javascript:void(0)l"><i class="fa fa-user"></i>Профил</a></li>
                                <li role="presentation"><a href="javascript:void(0)"><i class="fa fa-calendar"></i>Календар</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a href={{ URL::to('/lock-screen') }}><i class="fa fa-lock"></i>Заключи екран</a></li>
                                <li role="presentation"><a href={{ URL::to('/account/logout') }}><i class="fa fa-sign-out m-r-xs"></i>Излез</a></li>
                            </ul>
                        </li>
                    </ul><!-- Nav -->
                </div><!-- Top Menu -->
            </div>
        </div>
    </div>
    <!-- Navbar -->
    <div class="page-sidebar sidebar horizontal-bar">
        <div class="page-sidebar-inner">
            <ul class="menu accordion-menu">
                <li class="nav-heading"><span>Navigation</span></li>
                <li class="home">
                    <a href={{ URL::to('/home') }}><span class="menu-icon icon-home "></span>
                        <p>Начало</p>
                    </a>
                </li>
                @if(Auth::user()->roles[0]->name == 'Administrator')
                    <li class="accounts">
                        <a href={{ URL::to('/accounts') }}><span class="menu-icon icon-user"></span>
                            <p>Акаунти</p>
                        </a>
                    </li>
                @endif

                <li class="droplink">
                    <a href="javascript:void(0);">
                        <span class="menu-icon icon-clock"></span>
                        <p>Часове</p>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="inbox.html">Запазени часове</a></li>
                        <li><a href="message-view.html">Други</a></li>
                        <li><a href="compose.html">Compose</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Page Sidebar Inner -->
    </div>
    <!-- Page Sidebar -->
    <div class="page-inner">
        @yield('content')
                <!-- Main Wrapper -->
        <div class="page-footer">
            <div class="container">
                <p class="no-s">Created by Alexander Makedonski.</p>
            </div>
        </div>
    </div>
    <!-- Page Inner -->
</main>
<!-- Page Content -->
<div class="cd-overlay"></div>

@include('partials.js')

<script type="text/javascript">
    $(document).ready(function () {
        Globals = {  _token : '{{csrf_token()}}' }
    });
</script>

@yield('scripts')
</body>
</html>