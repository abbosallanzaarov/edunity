<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('studentpages/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('studentpages/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('studentpages/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('studentpages/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('studentpages/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('studentpages/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('studentpages/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('studentpages/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><img
                        src="{{ asset('studentpages/images/logo.svg') }}" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img
                        src="{{ asset('studentpages/images/logo-mini.svg') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now"
                                aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown ">
                        <a class="nav-link count-indicator dropdown-toggle " id="notificationDropdown" href="#"
                            data-toggle="dropdown">

                            <b class="text-warning fs-4">
                                {{ Session::get('coin') }}
                            </b>
                            <i class="ti ti-crown mx-0 text-warning fs-5" ></i>
                            {{-- <span class="count "></span> --}}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="ti-info-alt mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="ti-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="ti-user mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{asset(Auth::user()->user_image)}}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            {{-- <a class="dropdown-item">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a> --}}
                            <a class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btn btn-primary">Chiqish</button>
                                </form>
                            </a>
                        </div>
                    </li>
                    {{-- <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-ellipsis"></i>
                        </a>
                    </li> --}}
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Guruhlar</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{ route('studentGroups') }}">Mening guruhlarim</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Topshiriqlar</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('student.mygroups') }}">
                                        Mening topshiriqlarim</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('student.results') }}" aria-expanded="false" aria-controls="charts">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Natijalar</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>
                        {{-- <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/charts/chartjs.html">ChartJs</a></li>
                            </ul>
                        </div> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{route('shopping')}}" aria-expanded="false" aria-controls="charts">
                            <i class=" ti ti-gift menu-icon"></i>
                            <span class="menu-title">Magazin</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>
                        {{-- <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/charts/chartjs.html">ChartJs</a></li>
                            </ul>
                        </div> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="{{ route('group.reyting') }}" aria-expanded="false"
                            aria-controls="tables">
                            {{-- data-toggle="collapse" --}}
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">Guruh reytingi</span>
                            {{-- <i class="menu-arrow"></i> --}}
                        </a>
                        {{-- <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic
                                        table</a></li>
                            </ul>
                        </div> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false"
                            aria-controls="icons">
                            <i class="icon-contract menu-icon"></i>
                            <span class="menu-title">Kurs xaritasi</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('student.course.map') }}">Kurslar xaritalari</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="auth">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Foydalanuvchi</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('user.data') }}">User data</a>
                                </li>
                                {{-- <li class="nav-item"> <a class="nav-link" href="#">Edit data</a></li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false"
                            aria-controls="error">
                            <i class="icon-ban menu-icon"></i>
                            <span class="menu-title">Talim</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="error">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ route('student.attendance') }}"> Davomat
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="#"> Ogohlantirish
                                    </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="icon-chat menu-icon"></i>
                            <span class="menu-title">chat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Yo'riqnoma</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <!-- content-wrapper ends -->
                @yield('content')
                <!-- partial:partials/_footer.html -->
                {{-- <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                                template</a> from BootstrapDash. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                                href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
                    </div>
                </footer> --}}
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('studentpages/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('studentpages/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('studentpages/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('studentpages/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('studentpages/js/dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('studentpages/js/off-canvas.js') }}"></script>
    <script src="{{ asset('studentpages/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('studentpages/js/template.js') }}"></script>
    <script src="{{ asset('studentpages/js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('studentpages/js/dashboard.js') }}"></script>
    <script src="{{ asset('pagespages/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>
<style>
    .animation-container {
  display: relative;
  width : 100px;
  height : 100px;
}

.container {
  position: relative;
  top : 0px;
  height : 100px;
  width : 100px;
  transform : scale(0.5) translateX(0) scaleY(0.7);
}

.y-axis-container {
   animation: bounce 2.6s infinite ease-in-out;
}

.shadow {
   animation: scaling 2.6s infinite ease-in-out;
}

.coin {
  position : absolute;
  height : 100px;
  left : 0;
  width: 60px;
  background : gold;
  border-radius : 100%;
  overflow : hidden;
}

.side-coin {
  position : absolute;
  left : 10px;
  height : 300px;
  width: 20px;
  background : #f5b642;
}

.side {
  position: absolute;
  background : #f5b642;
  left : 22px;
  width : 25px;
  height : 50px;
  top: -2px;
}

.shine {
  width : 400px;
  height : 20px;
  background : rgba(255,255,255,0.65);
  transform: rotate(25deg);
  animation : shine 5s infinite;
}

.flash {
  z-index: 200;
  position : absolute;
  width : 15px;
  height : 15px;
  background : white;
  top: 30px;
  right : 20px;
  animation : flash 7s infinite;
}

.dai {
  position : absolute;
  width: 50px;
  height : 50px;
  background : #faf20a;
  border: 1px solid white;
  transform : rotate(53deg) skew(26deg);
  top: 94px;
  left : 35px;
  overflow : hidden;
}

.cutout {
  z-index : 20;
  width : 50%;
  height : 50%;
  background : #ffee38;
  transform : rotate(45deg);
  position : absolute;
  top : 29px;
  left : 29px;
}

.dai-shadow {
  z-index : 20;
  width : 150%;
  height : 150%;
  background : rgba(0,0,0,0.07);
  transform : rotate(45deg);
  position : absolute;
  top : 29px;
  right : 29px;
}

.inner-dai {
  position : relative;
  background : white;
  height : 70px;
  width: 70px;
  top : 15px;
  left : 15px;
}

.inner-inner-dai {
  position : relative;
  background : #ffee38;
  width: 20px;
  height : 20px;
  top : 25px;
  left : 25px;
}

.shadow {
  position : relative;
  left : calc(50% - 60px);
  top : -40px;
  background : rgba(0,0,0,0.2);
  height : 30px;
  width : 100px;
  animation : scaling 2.6s infinite;
  border-radius: 100%;
}

@keyframes bounce {
  20% {
    animation-timing-function: ease-out;
    transform: translateY(-60px);
  }

   50% {
    animation-timing-function: ease-out;
    transform: translateY(-80px);
  }
}

@keyframes scaling {
  20% {
    transform: scale(0.6);
  }

  50% {
    transform: scale(0.5);
  }
}

@keyframes flash {
  0% {
    transform : rotate(0deg) scale(0);
  }
  8% {
    transform : rotate(0deg) scale(0);
  }
  10% {
    transform : rotate(150deg) scale(1.8);
  }
  15% {
    transform : rotate(45deg) scale(0);
  }
  100% {
    transform : rotate(45deg) scale(0);
  }
}


@keyframes shine {
  20% {
    transform : rotate(25deg) translateY(400px);
  }

  100% {
    transform : rotate(25deg) translateY(400px);
  }
}

</style>
