<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('main/images/favicon_1.ico')}}">

        <title>Keti ERP- Complete solution for you business</title>

        <!-- Base Css Files -->
        <link href="{{asset('main/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{asset('main/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        {{-- <link href="{{asset('main/css/animate.css')}}" rel="stylesheet" /> --}}

        <!-- Waves-effect -->
        <link href="{{asset('main/css/waves-effect.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{asset('main/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('main/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- sweet alerts -->
        <link href="assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        {{-- <script src="{{asset('main/js/modernizr.min.js')}}"></script> --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="index.html" class="logo"><i class="zmdi zmdi-landscape"></i> <span>KETI </span></a>
            </div>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fa fa-bars"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>

                    {{-- <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="dropdown hidden-xs">
                            <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg">
                                <li class="text-center notifi-title">Notification</li>
                                <li class="list-group">
                                   <!-- list item-->
                                   <a href="javascript:void(0);" class="list-group-item">
                                      <div class="media">
                                         <div class="pull-left">
                                            <em class="fa fa-user-plus fa-2x text-info"></em>
                                         </div>
                                         <div class="media-body clearfix">
                                            <div class="media-heading">New user registered</div>
                                            <p class="m-0">
                                               <small>You have 10 unread messages</small>
                                            </p>
                                         </div>
                                      </div>
                                   </a>
                                   <!-- list item-->
                                    <a href="javascript:void(0);" class="list-group-item">
                                      <div class="media">
                                         <div class="pull-left">
                                            <em class="fa fa-diamond fa-2x text-primary"></em>
                                         </div>
                                         <div class="media-body clearfix">
                                            <div class="media-heading">New settings</div>
                                            <p class="m-0">
                                               <small>There are new settings available</small>
                                            </p>
                                         </div>
                                      </div>
                                    </a>
                                   <!-- last list item -->
                                    <a href="javascript:void(0);" class="list-group-item">
                                      <small>See all notifications</small>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                        </li>
                        <li class="hidden-xs">
                            <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('main/images/avatar-1.jpg')}}" alt="img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul> --}}
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="user-details">
                <div class="pull-left">
                    <img src="{{asset('main/images/users/avatar-1.jpg')}}" alt="" class="thumb-md img-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="pl-7">
                                        <i class="md md-settings-power"></i> {{__('Logout')}}
                                    </a>
                                </form>
                            </li>

                        </ul>
                    </div>
                    <p class="text-muted m-0">Administrator</p>
                </div>
            </div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{'/dashboard'}}" class="waves-effect active"><i class="zmdi zmdi-home"></i><span> Dashboard </span></a>
                    </li>
                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="zmdi zmdi-money-box"></i><span> Sales </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="inbox.html">Inbox</a></li>
                            <li><a href="email-compose.html">Compose Mail</a></li>
                            <li><a href="email-read.html">View Mail</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="zmdi zmdi-money"></i></i><span> Accounts </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="inbox.html">Inbox</a></li>
                            <li><a href="email-compose.html">Compose Mail</a></li>
                            <li><a href="email-read.html">View Mail</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="zmdi zmdi-collection-bookmark"></i><span> Ledger Book </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="inbox.html">Inbox</a></li>
                            <li><a href="email-compose.html">Compose Mail</a></li>
                            <li><a href="email-read.html">View Mail</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect"><i class="zmdi zmdi-dns"></i></i><span> Inventory Master </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="inbox.html">Item Master</a></li>
                            <li><a href="email-compose.html">Company Master</a></li>
                            <li><a href="email-read.html">Catagory Master</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="calendar.html" class="waves-effect"><i class="zmdi zmdi-accounts"></i><span> Users </span></a>
                    </li>

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">


        <div class="content">
            <div class="container">

               @yield('contains')

            </div> <!-- container -->

        </div> <!-- content -->


        <footer class="footer text-right">
            2023 © KETI.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

	    <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('main/js/jquery.min.js')}}"></script>
        <script src="{{asset('main/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('main/js/wave.js')}}"></script>

        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>

        <!-- CUSTOM JS -->
        <script src="{{asset('main/js/jquery.app.js')}}"></script>

	</body>
</html>
