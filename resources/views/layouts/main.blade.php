<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{asset('main/images/favicon_1.ico')}}">

        <title>Keti ERP- Complete solution for you business</title>

        <!-- Base Css Files -->
        <link href="{{asset('main/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{asset('main/assets/font-awesome/css/all.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/assets/font-awesome/css/fontawesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/assets/font-awesome/css/brands.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/assets/font-awesome/css/solid.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('main/assets/digitalclock/clock1.css')}}">
        <!-- animate css -->
        <link href="{{asset('main/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('main/css/waves-effect.css')}}" rel="stylesheet">

        <link href="{{asset('main/css/sweetalert2.min.css')}}" rel="stylesheet">
        <!-- Custom Files -->
        <link href="{{asset('main/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('main/css/style.css')}}" rel="stylesheet" type="text/css" />
        <!-- sweet alerts -->

        <!-- DataTables -->
        <link href="{{asset('main/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <!--Morris Chart CSS -->
        {{-- <link rel="stylesheet" href="{{asset('main/assets/morris/morris.css')}}"> --}}

        <link href="{{asset('main/assets/timepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" />
        <link href="{{asset('main/assets/select2/select2.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('main/css/jquery-editable-select.css')}}" rel="stylesheet" type="text/css" />



        {{-- <script src="{{asset('main/js/modernizr.min.js')}}"></script> --}}

        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    </head>

    <body class="fixed-left" >
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="#" class="logo">
                            <img src="{{asset('main/images/keti-tp.png')}}" alt="KETI-LOGO" style="width: 50px; height:50px">
                            {{-- <span>KETI </span> --}}
                        </a>
                    </div>
                </div>
               <!-- Button mobile view to collapse sidebar menu -->
                {{-- <div class="navbar navbar-default ">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left">
                                <i class="fa fa-bars"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>
                        <form class="navbar-form mr-auto " role="search">
                            <div class="form-group">
                                <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                            </div>
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </form>
                        <div class="datetime">
                            <div class="date">
                              <span id="day">Day</span>,
                              <span id="month">Month</span>
                              <span id="num">00</span>,
                              <span id="year">Year</span>
                            </div>
                            <div class="time">
                              <span id="hour">00</span>:
                              <span id="min">00</span>:
                              <span id="sec">00</span>
                              <span id="period">AM</span>
                            </div>
                          </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">

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
                </div> --}}
                <nav class="navbar navbar-expand-lg  navbar-default">

                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fa fa-bars"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <form class="navbar-form mr-auto " role="search">
                            <div class="form-group">
                                <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                            </div>
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </form>
                      </ul>
                      <div class="datetime">
                        <div class="date">
                          <span id="day">Day</span>,
                          <span id="month">Month</span>
                          <span id="num">00</span>,
                          <span id="year">Year</span>
                        </div>
                        <div class="time">
                          <span id="hour">00</span>:
                          <span id="min">00</span>:
                          <span id="sec">00</span>
                          <span id="period">AM</span>
                        </div>
                      </div>
                      <div class="dropdown">
                        <a class="nav-link dropdown-toggle profile" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('main/images/avatar-1.jpg')}}" alt="user-img" class="img-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-cus">
                        <a href="javascript:void(0)" class="dropdown-item"><i class="fa fa-user-circle" aria-hidden="true"></i>
                            Profile</a>
                        <a href="javascript:void(0)" class="dropdown-item"><i class="fas fa-cog fa-spin"></i> Settings</a>
                        <a href="javascript:void(0)" class="dropdown-item"><i class="fas fa-lock"></i> Lock screen</a>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        </div>
                      </div>
                    </div>
                </nav>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner ">
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
                            <p class="text-muted m-0">{{ Auth::user()->is_superadmin}}</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{'/dashboard'}}" class="waves-effect {{ (request()->is('dashboard')) ? 'active' : '' }}"><i class="zmdi zmdi-home"></i><span> Dashboard </span></a>
                            </li>
                            <li class="has_sub">
                                {{-- {{ (request()->is('sales')) ? 'active' : '' }} --}}
                                <a href="#" class="waves-effect "><i class="zmdi zmdi-swap"></i><span> Transactions </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('sales.index')}}"><i class="fas fa-comments-dollar m-r-10"></i><span>Sales</span></a></li>
                                    <li><a href="{{route('purchase.index')}}"><i class="fas fa-shopping-basket m-r-10"></i>Purchases</a></li>
                                    <li><a href="#"><i class="fas fa-cogs m-r-10"></i>Production</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect "><i class="zmdi zmdi-money"></i></i><span> Accounts </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{'/account/groups'}}"><i class="zmdi zmdi-book m-r-10"></i> Accounts Book</a></li>
                                    <li><a href="#"><i class="fas fa-receipt m-r-10"></i> Receipt</a></li>
                                    <li><a href="#"><i class="far fa-money-bill-alt m-r-10"></i>Payment</a></li>
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
                                    <li><a href="{{route('supplier.index')}}">Supplier</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect f-con"><i class="zmdi zmdi-balance"></i><span> Inventory Master </span><span class="pull-right"><i class="zmdi zmdi-plus"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('items.index')}}">Item Master</a></li>
                                    <li><a href="email-compose.html">Company Master</a></li>
                                    <li><a href="email-read.html">Catagory Master</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{('/company')}}" class="waves-effect"><i class="zmdi zmdi-accounts"></i><span> Company  </span></a>
                            </li>
                            <li>
                                <a href="{{('/dashboard')}}" class="waves-effect"><i class="zmdi zmdi-accounts"></i><span> Users </span></a>
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
                    <div class="rows">

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
        <script src="{{asset('main/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('main/js/jspdf.umd.min.js')}}"></script>
        <script src="{{asset('main/js/waves.js')}}"></script>
        <script src="{{asset('main/js/wow.min.js')}}"></script>
        <script src="{{asset('main/assets/select2/select2.min.js')}}" type="text/javascript"></script>

        <script src="{{asset('main/assets/font-awesome/js/all.min.js')}}"></script>
        <script src="{{asset('main/assets/font-awesome/js/fontawesome.min.js')}}"></script>
        <script src="{{asset('main/assets/font-awesome/js/brands.js')}}"></script>
        <script src="{{asset('main/assets/font-awesome/js/solid.js')}}"></script>

        <!-- Live Search  -->
        <script src="{{asset('main/assets/fastclick/fastclick.js')}}"></script>

        <script src="{{asset('main/assets/jquery-detectmobile/detect.js')}}"></script>

        {{-- <script src="{{asset('main/js/jquery.nicescroll.js')}}" type="text/javascript"></script> --}}
        {{-- <script src="{{asset('main/js/jquery.scrollTo.min.js')}}"></script> --}}
        <script src="{{asset('main/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('main/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

         <!--Morris Chart-->
         {{-- <script src="{{asset('main/assets/morris/morris.min.js')}}"></script>
         <script src="{{asset('main/assets/morris/raphael.min.js')}}"></script>
         <script src="{{asset('main/assets/morris/morris.init.js')}}"></script> --}}


         <!-- CUSTOM JS -->
         <script src="{{asset('main/js/jquery.app.js')}}"></script>
        {{-- DataTable --}}
         <script src="{{asset('main/assets/datatables/jquery.dataTables.min.js')}}"></script>
         {{-- <script src="{{asset('main/assets/datatables/dataTables.bootstrap.min.js')}}"></script> --}}

         <script src="{{asset('main/assets/timepicker/js/bootstrap-datepicker.min.js')}}"></script>

         <!-- Counter-up -->
         <script src="{{asset('main/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
         <script src="{{asset('main/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
         <!-- sweet alerts -->
        <script src="{{asset('main/js/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('main/assets/digitalclock/digital.js')}}"></script>

        {{-- from validator --}}
        <script src="{{asset('main/assets/jquery.validate/jquery.validate.min.js')}}"></script>
        <script src="{{asset('main/assets/jquery.validate/form-validation-init.js')}}"></script>
        {{-- dynamic input --}}
        <script src="{{asset('main/js/jquery.replicate.js')}}"></script>
        {{-- select and search --}}
        <script src="{{asset('main/js/jquery-editable-select.js')}}"></script>





        @stack('dashboard')
        @stack('customers')
        @stack('supplier')
        @stack('quote')
        @stack('order')
        @stack('invoice')
        @stack('accountgroup')
        @stack('items')
        @stack('store')



        <script type="text/javascript">

            initClock();

            //CounterUp
            jQuery(document).ready(function() {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
            $(document).ready(function() {
                 // Select2
                $(".select2").select2({
                    width: '100%',
                });
            });

            $(document).ready(function() {
                $('#datatable').dataTable();

            } );

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
