<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>{{Auth::user()->name}} Kabineti</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset("css/font-face.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/font-awesome-4.7/css/font-awesome.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/font-awesome-5/css/fontawesome-all.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/mdi-font/css/material-design-iconic-font.min.css")}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset("vendor/bootstrap-4.1/bootstrap.min.css")}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset("vendor/animsition/animsition.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/wow/animate.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/css-hamburgers/hamburgers.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/slick/slick.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/select2/select2.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/perfect-scrollbar/perfect-scrollbar.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/vector-map/jqvmap.min.css")}}" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{asset("css/theme.css")}}" rel="stylesheet" media="all">

</head>

<body class="animsition" style="animation-duration: 900ms; opacity: 1;">
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="images/icon/logo.png" alt="CoolAdmin">
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="active has-sub">
                        <a class="js-arrow" href="{{route('attendanceseshow')}}">
                            <i class="fas fa-tachometer-alt"></i>Davomat </a>

                    </li>
                    <li>
                        <a href="{{route('tema.index')}}">
                            <i class="fas fa-chart-bar"></i>Mavzu Yaratish</a>
                    </li>
                    <li>
                        <a href="{{route('point.index')}}">
                            <i class="fas fa-table"></i>Ball Berish.</a>
                    </li>
                    <li>
                        <a href="{{ route('mentorgroup') }}">
                            <i class="far fa-check-square"></i>Guruhlar</a>
                    </li>
                    <li>
                        <a href="calendar.html">
                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                    </li>
                    <li>
                        <a href="{{ route('mentor.checked.tasks') }}">
                            <i class="fas fa-map-marker-alt"></i>Uyga vazifa tekshirish</a>
                    </li>
                    <li>
                        <a href="chatify">
                            <i class="fa-brands fa-telegram">chat</i>
                            </a>
                    </li>
                    <li class="has-sub">
                        <form action="{{ route('logout') }}" method="post" class="menu-link">
                            @csrf
                            <button class="btn btn-danger d-flex">
                                <i class="menu-icon tf-icons bx bx-exit"></i>
                                <div>Chiqish</div>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->

        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin">
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1 ps">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{route('attendanceseshow')}}">
                                <i class="fas fa-tachometer-alt"></i>Davomat </a>

                        </li>
                        <li>
                            <a href="{{route('tema.index')}}">
                                <i class="fas fa-chart-bar"></i>Mavzu Yaratish</a>
                        </li>
                        <li>
                            <a href="{{route('point.index')}}">
                                <i class="fas fa-table"></i>Ball Berish.</a>
                        </li>
                        <li>
                            <a href="{{ route('mentorgroup') }}">
                                <i class="far fa-check-square"></i>Guruhlar</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="{{ route('mentor.checked.tasks') }}">
                                <i class="fas fa-map-marker-alt"></i>Uyga vazifa tekshirish</a>
                        </li>
                        <li class="has-sub">
                            <form action="{{ route('logout') }}" method="post" class="menu-link">
                                @csrf
                                <button class="btn btn-danger d-flex">
                                    <i class="menu-icon tf-icons bx bx-exit"></i>
                                    <div>Chiqish</div>
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                {{-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports...">
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> --}}
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno">
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers">
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey">
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey">
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey">
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ asset(Auth::user()->user_image) }}" class="rounded-circle shadow-4" style="width: 150px;" alt="Avatar" />
                                            {{-- <img src="{{Auth::user()->user_image}}" alt="{{Auth::user()->name}}"> --}}
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ asset(Auth::user()->user_image) }}" class="rounded-circle shadow-4" style="width: 150px;" alt="Avatar" />
                                                        {{-- <img src="{{Auth::user()->user_image}}" alt="{{Auth::user()->name}}" class="avatar"> --}}
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{Auth::user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                            <div class="account-dropdown__footer">
                                                <form action="{{ route('logout') }}" method="post" class="menu-link">
                                                    @csrf
                                                    <button class="btn btn-danger d-flex">
                                                        <i class="menu-icon tf-icons bx bx-exit"></i>
                                                        <div>Chiqish</div>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">

                @yield('mentoryield')
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    {{-- <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script> --}}





</body>

<script src="{{asset("vendor/jquery-3.2.1.min.js")}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset("vendor/bootstrap-4.1/popper.min.js")}}"></script>
<script src="{{asset("vendor/bootstrap-4.1/bootstrap.min.js")}}"></script>
<!-- Vendor JS       -->
<script src="{{asset("vendor/slick/slick.min.js")}}">
</script>
<script src="{{asset("vendor/wow/wow.min.js")}}"></script>
<script src="{{asset("vendor/animsition/animsition.min.js")}}"></script>
<script src="{{asset("vendor/bootstrap-progressbar/bootstrap-progressbar.min.js")}}">
</script>
<script src="{{asset("vendor/counter-up/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("vendor/counter-up/jquery.counterup.min.js")}}">
</script>
<script src="{{asset("vendor/circle-progress/circle-progress.min.js")}}"></script>
<script src="{{asset("vendor/perfect-scrollbar/perfect-scrollbar.js")}}"></script>
<script src="{{asset("vendor/chartjs/Chart.bundle.min.js")}}"></script>
<script src="{{asset("vendor/select2/select2.min.js")}}">
</script>
<script src="{{asset("vendor/vector-map/jquery.vmap.js")}}"></script>
<script src="{{asset("vendor/vector-map/jquery.vmap.min.js")}}"></script>
<script src="{{asset("vendor/vector-map/jquery.vmap.sampledata.js")}}"></script>
<script src="{{asset("vendor/vector-map/jquery.vmap.world.js")}}"></script>

<!-- Main JS-->
<script src="{{asset("js/main.js")}}"></script>
</html>
<!-- end document-->
