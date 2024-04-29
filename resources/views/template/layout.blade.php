<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Project Kasir</title>

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminlte3')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link href="{{ asset('sweetalert2') }}/sweetalert2.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('template') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('template') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('template') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('template') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('template') }}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('template') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('template') }}/build/css/custom.min.css" rel="stylesheet">
    <link href="{{ asset('bootstrap5') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/vendors/datatables-bs4/css/dataTables.bootstrap4.min.css">
    @stack('style')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url ('/category') }}" class="site_title"><i class="fa fa-paw"></i> <span>PEACFE CAFE</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="cafe.jpg" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>DINA</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                @if (Auth::user()->level == 1)
                <h3>ADMIN</h3>
                <!-- <ul class="nav side-menu">
                  <li><a href="{{ url('/kontak')}}"><i class="fa fa-readme"></i> Contact Us</a>
                  </li>
                </ul> -->
                <ul class="nav side-menu">
                  <li><a href="{{ url('/grafik')}}"><i class="fa-solid fa-chart-area"></i> Dashboard</a>
                  </li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="{{ url('/jenis')}}"><i class="fa fa-readme"></i> Jenis</a>
                  </li>
                </ul>
                <!-- <ul class="nav side-menu">
                  <li><a href="{{ url('/kategori')}}"><i class="fa fa-readme"></i> Category</a>
                  </li>
                </ul> -->
                <ul class="nav side-menu">
                  <li><a href="{{ url('/menu')}}"><i class="fa fa-utensils"></i> Menu</a>
                  </li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="{{ url('/stok')}}"><i class="fa fa-cart-plus"></i> Stok</a>
                  </li>
                </ul>
                <!-- <ul class="nav side-menu">
                  <li><a href="{{ url('/absensi')}}"><i class="fa-solid fa-user-tie"></i> Absensi</a>
                  </li> -->
                <!-- <ul class="nav side-menu">
                  <li><a href="{{ url('/about')}}"><i class="fa fa-cart-plus"></i> About App</a>
                  </li>
                </ul> -->
                <!-- <ul class="nav side-menu">
                  <li><a href="{{ url('/logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                  </li>
                </ul> -->
                @endif
                @if (Auth::user()->level == 2)
                <h3>KASIR</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('/pelanggan')}}"><i class="fa fa-users"></i> Pelanggan</a>
                  </li>
                </ul>
                <ul class="nav side-menu">
                  <li><a href="{{ url('/pemesanan')}}"><i class="fa fa-cash-register"></i> Pemesanan</a>
                  </li>
                </ul>
                <!-- <ul class="nav side-menu">
                  <li><a href="{{ url('/meja')}}"><i class="fa fa-table"></i> Meja</a>
                  </li>
                </ul> -->
                <!-- <ul class="nav side-menu">
                  <li><a href="{{ url('/logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                  </li>
                </ul> -->
                @endif
                @if (Auth::user()->level == 3)
                <ul class="nav side-menu">
                  <li><a href="{{ url('/laporan')}}"><i class="fa fa-book"></i> Laporan</a>
                  </li>
                </ul>
                <!-- <ul class="nav side-menu">
                  <li><a href="{{ url('/logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                  </li>
                </ul> -->
                @endif
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a href="{{url('/logout') }}" class="nav-link">
                            <i class="nav-icon fa fa-power-off"></i>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            @yield('content')
            <!-- /page content -->

            <!-- footer content -->
            @include('template/footer')
        </div>
    </div>