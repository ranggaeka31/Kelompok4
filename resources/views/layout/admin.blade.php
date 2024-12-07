<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- <title>Tabungan</title> --}}
    @yield('title')
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('NiceAdmin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('NiceAdmin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="{{ asset('NiceAdmin/https://fonts.gstatic.com') }}" rel="preconnect">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/fontawesome/css/fontawesome.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('NiceAdmin/assets/css/style.css') }}" rel="stylesheet">

    @stack('style')

    <link href="{{ asset('NiceAdmin/assets/js/sweetalert.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('NiceAdmin/assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">Tabungan</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                {{-- <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('NiceAdmin/assets/img/profile-img.jpg') }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav --> --}}

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('welcome') ? 'active' : '' }}" href="/welcome">
                        <i class="bx bx-grid-alt"></i>
                        <span>Beranda</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('datapenabung') ? 'active' : '' }}" href="/datapenabung">
                        <i class="bx bx-user"></i>
                        <span>Data Penabung</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('uangmasuk') ? 'active' : '' }}" href="/uangmasuk">
                        <i class="bx bx-wallet"></i>
                        <span>Uang Ditabung</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('uangkeluar') ? 'active' : '' }}" href="/uangkeluar">
                        <i class="bx bx-dollar-circle"></i>
                        <span>Uang Ditarik</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('histori') ? 'active' : '' }}" href="/histori">
                        <i class="bx bx-task"></i>
                        <span>Histori</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('laporanmasuk') ? 'active' : '' }}" href="/laporanmasuk">
                        <i class="bx bx-notepad"></i>
                        <span>Laporan Uang Ditabung</span>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('laporankeluar') ? 'active' : '' }}" href="/laporankeluar">
                        <i class="bx bx-notepad"></i>
                        <span>Laporan Uang Ditarik</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link collapsed{{ Request::is('logout') ? 'active' : '' }}" href="/logout">
                    <i class="bx bx-log-out"></i>
                    <span>Keluar</span>
                </a>
            </li>
        </ul>
        </li><!-- End Components Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Kelompok 4</span></strong>
        </div>
        <div class="credits">
              Designed by <a href="">RANGGA</a>
        </div>
    </footer> --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

   

   
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> --}}


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
     <!-- Vendor JS Files -->
     <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="{{ asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

     <script src="{{ asset('NiceAdmin/assets/vendor/quill/quill.min.js') }}"></script>
     <script src="{{ asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
     <script src="{{ asset('NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>
     <script src="{{ asset('NiceAdmin/assets/fontawesome/js/fontawesome.js') }}"></script>

     @stack('script')
     <!-- Template Main JS File -->
     <script src="{{ asset('NiceAdmin/assets/js/main.js') }}"></script>

</body>

</html>
