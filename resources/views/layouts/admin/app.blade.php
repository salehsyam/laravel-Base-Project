<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title .' | '. config('app.name', 'Laravel') : config('app.name', 'Laravel')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin_files/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin_files/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_files/plugins/toastr/toastr.min.css')}}">

    <style>
        body{min-width:480px!important}.text-ellipsis{text-overflow:ellipsis;white-space:nowrap}.navbar-badge{right:5px;top:5px}.navbar-expand .navbar-nav .nav-link{padding:.5rem 1rem}.user-dropdown .nav-link{padding:0 1rem!important}.user-dropdown .nav-link img{width:30px;height:30px}.main-sidebar ::-webkit-scrollbar{width:5px}.main-sidebar ::-webkit-scrollbar:hover{width:7px}.main-sidebar ::-webkit-scrollbar-track{background:#343a40}.main-sidebar ::-webkit-scrollbar-thumb{background:#888;border-radius:2px}.main-sidebar ::-webkit-scrollbar-thumb:hover{background:#555}.nav-sidebar .menu-open>.nav-link i.right{transform:rotate(90deg)}.popover{left:auto}.layout-navbar-fixed .wrapper .main-header{z-index:1061}.index-flag{position:relative;top:10px;left:15px}.pull-left{float:left!important}.pull-right{float:right!important}
    </style>
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('admin_files/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('admin_files/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{asset('admin_files/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <!-- User Dropdown Menu -->
            <li class="nav-item dropdown user-dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">

                    <img  src="{{asset('admin_files/img/avatar2.png')}}"
                          alt=""
                          class="img-circle elevation-2">
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right user-dropdown-menu">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-address-card  mr-2"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        {{ __('logout') }}
                    </a>
                     </div>

            </li>


        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('layouts.admin._aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('breadcrumb')
    <!-- Main content -->
            @yield('content')

    </div>
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy;  2019<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script>,AdminLTE.io</a>
            </strong>        </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin_files/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin_files/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin_files/js/adminlte.min.js')}}"></script>
<!-- axios  -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- Toastr -->
<script src="{{asset('admin_files/plugins/toastr/toastr.min.js')}}"></script>
@stack('scripts')
</body>
</html>
