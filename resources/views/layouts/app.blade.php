<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link type="text/css" href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    @livewireStyles
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('wisata.index') }}" href="index.html">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Wisata</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('pelanggan.index') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pelanggan</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('tiketing.index') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tiketing</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('chart.list') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Keranjang Tiket</span></a>
            </li>

            {{-- <li class="nav-item active">
                <a class="nav-link" href="{{ route('transaksi.index') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pemesanan</span></a>
            </li> --}}

            <li class="nav-item active">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Tiket Validator</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div class="d-flex flex-column" id="content-wrapper">

            <!-- Main Content -->
            <div id="content">

                <nav class="navbar navbar-expand navbar-light topbar static-top mb-4 bg-white shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline ml-md-3 my-md-0 mw-100 navbar-search my-2 mr-auto">
                        <div class="input-group">
                            <input class="form-control bg-light small border-0" type="text" aria-label="Search"
                                aria-describedby="basic-addon2" placeholder="Search for...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" id="searchDropdown" data-toggle="dropdown"
                                href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right animated--grow-in p-3 shadow"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline w-100 navbar-search mr-auto">
                                    <div class="input-group">
                                        <input class="form-control bg-light small border-0" type="text"
                                            aria-label="Search" aria-describedby="basic-addon2"
                                            placeholder="Search for...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="/">
                                Halaman Utama
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown"
                                href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="d-none d-lg-inline small mr-2 text-gray-600">{{ \Str::upper(auth()->user()->name) }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('template/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right animated--grow-in shadow"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal"
                                    href="#">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                {{ $slot }}
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright my-auto text-center">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.j') }}s"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script>
    @livewireScripts
    @stack('js')
</body>

</html>
