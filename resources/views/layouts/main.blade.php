<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{asset('main/images/favicon_1.ico')}}">

        <title>Keti ERP- Complete solution for you business</title>

        <!-- Base Css Files -->
        <link href="{{asset('main/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{asset('main/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('main/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('main/css/waves-effect.css')}}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{asset('main/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('main/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{asset('main/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{asset('main/assets/morris/morris.css')}}">

        <link href="{{asset('main/assets/timepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- sweet alerts -->
        <link href="{{asset('main/css/sweetalert2.min.css')}}" rel="stylesheet">

        {{-- <script src="{{asset('main/js/modernizr.min.js')}}"></script> --}}

        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

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
                        <form class="navbar-form pull-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                            </div>
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </form>

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                    <i class="zmdi zmdi-notifications-active"></i> <span class="badge badge-xs badge-danger">3</span>
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
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                          <div class="media">
                                             <div class="pull-left">
                                                <em class="fa fa-bell-o fa-2x text-danger"></em>
                                             </div>
                                             <div class="media-body clearfix">
                                                <div class="media-heading">Updates</div>
                                                <p class="m-0">
                                                   <small>There are
                                                      <span class="text-primary">2</span> new updates available</small>
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
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="zmdi zmdi-crop-free"></i></a>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="zmdi zmdi-comment-text-alt"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{asset('main/images/avatar-1.jpg')}}" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="md md-settings-power"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
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
                                    <li><a href="#"><i class="zmdi zmdi-face"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li>
                                        <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power-off-setting"></i> {{__('Logout')}}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </div>
                            <p class="text-muted m-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{'/dashboard'}}" class="waves-effect {{ (request()->is('dashboard')) ? 'active' : '' }}"><i class="zmdi zmdi-home"></i><span> Dashboard </span></a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect "><i class="zmdi zmdi-money-box {{ (request()->is('sales/salesquotes')) ? 'active' : '' }}"></i><span> Sales </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{'/sales/salesquotes'}}">Sales Quotes</a></li>
                                    <li><a href="{{'/sales/salesorder'}}">Sales Order</a></li>
                                    <li><a href="#">Sales Invoice</a></li>
                                    <li><a href="#">Sales Bill</a></li>
                                    <li><a href="#">Sales Return</a></li>
                                    <li><a href="#">Purchases</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="zmdi zmdi-money"></i></i><span> Accounts </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Accounts Group</a></li>
                                    <li><a href="#">Accounts Book</a></li>
                                    <li><a href="#">Receipt</a></li>
                                    <li><a href="#">Payment</a></li>
                                    <li><a href="#">Debit Note</a></li>
                                    <li><a href="#">Credit Note</a></li>
                                    <li><a href="#">Journal</a></li>
                                    <li><a href="#">Contra</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="zmdi zmdi-collection-bookmark"></i><span> Ledger Book </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{('/ledger/customer')}}">Customer</a></li>
                                    <li><a href="#">Supplier</a></li>
                                    <li><a href="#">Inbox</a></li>
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
                    <div class="container bg-img-2">
                        {{-- <div class="bg-overlay-2"></div> --}}

                        @yield('contents')

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
        <script src="{{asset('main/js/waves.js')}}"></script>
        <script src="{{asset('main/js/wow.min.js')}}"></script>

        <!-- Live Search  -->
        <script src="{{asset('main/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('main/assets/jquery-detectmobile/detect.js')}}"></script>

        {{-- <script src="{{asset('main/js/wow.min.js')}}"></script> --}}
        {{-- <script src="{{asset('main/js/jquery.nicescroll.js')}}" type="text/javascript"></script> --}}
        {{-- <script src="{{asset('main/js/jquery.scrollTo.min.js')}}"></script> --}}
        <script src="{{asset('main/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('main/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

         <!--Morris Chart-->
         {{-- <script src="{{asset('main/assets/morris/morris.min.js')}}"></script>
         <script src="{{asset('main/assets/morris/raphael.min.js')}}"></script>
         <script src="{{asset('main/assets/morris/morris.init.js')}}"></script> --}}

        <!-- sweet alerts -->
        <script src="{{asset('main/js/sweetalert2.all.min.js')}}"></script>

        <!-- CUSTOM JS -->
        <script src="{{asset('main/js/jquery.app.js')}}"></script>
        <script src="{{asset('main/js/dynamicinput.js')}}"></script>

        <script src="{{asset('main/assets/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('main/assets/datatables/dataTables.bootstrap.js')}}"></script>

        <script src="{{asset('main/assets/timepicker/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('main/js/select2.min.js')}}" type="text/javascript"></script>

         <!-- Counter-up -->
         <script src="{{asset('main/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
         <script src="{{asset('main/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
         <!-- Dashboard -->
        <script src="{{asset('main/js/quote/quote.js')}}"></script>
        <script src="{{asset('main/js/customer/addcustomer.js')}}"></script>

        <script type="text/javascript">

            //CounterUp
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
            jQuery(document).ready(function() {
                    // Date Picker
                jQuery('#datepicker').datepicker();
                jQuery('#datepicker-inline').datepicker();

                 // Select2
                jQuery(".select2").select2({
                    width: '100%'
                })
            });

            $(document).ready(function() {
                $('#datatable').dataTable();
            } )

            // Morris.Bar({
            //     element: 'morris-bar-example',
            //     data: [
            //         { y: '21/10/2022', a: 100, b: 90, c: 51 },
            //         { y: '22/10/2022', a: 75,  b: 65, c: 20 },
            //         { y: '23/10/2022', a: 50,  b: 40, c: 51 },
            //         { y: '24/10/2022', a: 75,  b: 65, c: 40 },
            //         { y: '25/10/2022', a: 50,  b: 40, c: 14 },
            //         { y: '26/10/2022', a: 75,  b: 65, c: 55 },
            //         { y: '27/10/2022', a: 100, b: 90, c: 51 },
            //         { y: '28/10/2022', a: 95,  b: 26, c: 11 },
            //     ],
            //     xkey: 'y',
            //     ykeys: ['a', 'b', 'c'],
            //     labels: ['Profit', 'Loss','Neutral']
            // });

        </script>
	</body>
</html>
