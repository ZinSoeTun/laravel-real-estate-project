<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.css') }}" rel="stylesheet">
    {{-- bootstrap css cdn link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" alt=""
                        width="50" height="50">
                </div>
                <div class="sidebar-brand-text text-primary mx-3">King of the king</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- Nav Item -  House Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-house"></i>
                    <span>House</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.house.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            Create
                        </a>
                        <a class="collapse-item" href="{{ route('admin.house.list') }}">
                            <i class="fa-solid fa-list"></i>
                            list
                        </a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Overview Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Overview</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.overview.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            Create Detail
                        </a>
                        <a class="collapse-item" href="{{ route('admin.overview.createHousePage') }}">
                            <i class="fa-solid fa-plus"></i>
                            Create House Image
                        </a>
                        <a class="collapse-item" href="{{ route('admin.overview.list') }}">
                            <i class="fa-solid fa-list"></i>
                            Detail list
                        </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Account Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-user"></i>
                    <span>Account</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.userList') }}">
                            <i class="fa-solid fa-list"></i>
                            User list
                        </a>
                        <a class="collapse-item" href="{{ route('admin.adminList') }}">
                            <i class="fa-solid fa-list"></i>
                            Admin list
                        </a>
                    </div>
                </div>
            </li>
            <!-- Nav Item -  Agent Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa-brands fa-magento"></i>
                    <span>Agent</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.agent.create') }}">
                            <i class="fa-solid fa-plus"></i>
                            Create
                        </a>
                        <a class="collapse-item" href="{{ route('admin.agent.list') }}">
                            <i class="fa-solid fa-list"></i>
                            list
                        </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center">
                <img src="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" alt=""
                    width="150" height="150">
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                      <h1 class="mt-2 p-4" style="font-family:Georgia, 'Times New Roman', Times, serif">
                        Welcome From King Of The King Admin Dashboard
                      </h1>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle pt-5 mt-2" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small text-primary">
                                @if (Auth::user())
                                {{ Auth::user()->name }}
                                @endif
                                </span>
                                {{-- profile image --}}
                              @if (Auth::user())
                              @if (Auth::user()->image == null)
                              <div class="text-center  rounded-circle img-thumbnail">
                                  <img src="{{ asset('user/img/noimage.png') }}" alt="noimage" width="50"
                                      height="50">
                              </div>
                          @else
                              <div class="text-center mb-4">
                                  <img class=" rounded-circle img-thumbnail"
                                      src="{{ asset('storage/profile/' . Auth::user()->image) }}"
                                      alt="image" width="70" height="70">
                              </div>
                          @endif
                              @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.profile.logout') }}"
                                    data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')


            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-light">×</span>
                    </button>
                </div>
                <div class="modal-body bg-dark text-light">
                    <i class="fa-solid fa-triangle-exclamation text-danger"></i>
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer bg-dark text-light">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.profile.logout') }}" method="post">
                        @csrf
                        <a href="">
                            <input style="border-radius: 4px; color:white" class=" btn btn-success" type="submit"
                                value="Log Out">
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-secondary">
        <div class="container my-auto">
            <div class="copyright text-center text-white my-auto">
                <span>Copyright &copy; By King of the king group</span>
                <div class="mt-3">
                    <img src="{{ asset('user/img/1H5TLj-LogoMakr-removebg-preview.png') }}" alt=""
                        width="60" height="60">
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/js/demo/chart-pie-demo.js') }}"></script>
    {{-- bootstrap js cdn link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
