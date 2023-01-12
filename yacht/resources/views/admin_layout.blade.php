<!DOCTYPE html>
<head>
    <title>Management page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('public/backend/js/morris.js')}}"></script>


    <!--//google map -->
    <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYSkGKeqNC5qSOtfhcCSD8YpNp15svA9w&libraries=places&callback=initMap">
    </script>
    <!-- amchart -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="{{URL::to('/show-dashboard')}}" class="logo">
                ADMIN
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            @include('layout.parts.top_bar')
        </div>

        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder=" Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{asset('public/backend/images/2.png')}}">
                        <span class="username">

                        </span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="{{URL::to('/show-dashboard')}}">
                            <i class="fa fa-dashboard"></i>
                            <span>Overview</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Services</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-services')}}">Add Service</a></li>
                            <li><a href="{{URL::to('/all-services')}}">Service List</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-user-secret"></i>
                            <span>Customer</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-customers')}}">Add Customer</a></li>
                            <li><a href="{{URL::to('/all-customers')}}">Customers List</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-ship"></i>
                            <span>Yacht</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-yachts')}}">Add yacht</a></li>
                            <li><a href="{{URL::to('/all-yachts')}}">Yacht list</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-file-text"></i>
                            <span>Rent registration</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-rent-registration')}}">Add registration</a></li>
                            <li><a href="{{URL::to('/all-rent-registration')}}">Registration list</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="{{URL::to('/all-leases')}}">
                            <i class="fa fa-tasks"></i>
                            <span>Leases</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-gears"></i>
                            <span>Style</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-style')}}">Add style</a></li>
                            <li><a href="{{URL::to('/all-style')}}">Style list</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-map-signs"></i>
                            <span>Tour</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-tour')}}">Add tour</a></li>
                            <li><a href="{{URL::to('/all-tour')}}">Tour list</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-anchor"></i>
                            <span>Marina</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-marina')}}">Add marina</a></li>
                            <li><a href="{{URL::to('/all-marina')}}">Marina list</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-photo"></i>
                            <span>Image Gallery</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-image-gallery')}}">Add gallery</a></li>
                            <li><a href="{{URL::to('/all-image-gallery')}}">Gallery list</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-user"></i>
                            <span>User</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-user')}}">Add user</a></li>
                            <li><a href="{{URL::to('/all-user')}}">User list</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="{{URL::to('/all-history-mooring')}}">
                            <i class="fa fa-history"></i>
                            <span>History mooring</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @yield('admin_content')
        </section>
        <!-- footer -->
        <div class="footer">
            <div class="wthree-copyright">

            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('public/backend/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>


<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
<script type="text/javascript">
</script>

</body>
</html>
