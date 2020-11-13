<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Qovex - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-template/assets/images/favicon.ico')}}">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('admin-template/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin-template/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin-template/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin-template/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-layout="horizontal" data-topbar="dark">

    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('admin-template/assets/images/logo-sm-dark.png')}}" alt=""
                                        height="20">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('admin-template/assets/images/logo-dark.png')}}" alt=""
                                        height="18">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('admin-template/assets/images/logo-sm-dark.png')}}" alt=""
                                        height="20">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('admin-template/assets/images/logo-light.png')}}" alt=""
                                        height="18">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                            data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <div class="topnav">
                            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                                <div class="collapse navbar-collapse" id="topnav-menu-content">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#"
                                                id="topnav-dashboard" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Dashboard <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                                <a href="index.html" class="dropdown-item">Dashboard 1</a>
                                                <a href="index-2.html" class="dropdown-item">Dashboard 2</a>
                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#"
                                                id="topnav-components" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                UI Elements <div class="arrow-down"></div>
                                            </a>

                                            <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                                                aria-labelledby="topnav-components">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <a href="ui-alerts.html" class="dropdown-item">Alerts</a>
                                                            <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                                            <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                                            <a href="ui-carousel.html"
                                                                class="dropdown-item">Carousel</a>
                                                            <a href="ui-dropdowns.html"
                                                                class="dropdown-item">Dropdowns</a>
                                                            <a href="ui-grid.html" class="dropdown-item">Grid</a>
                                                            <a href="ui-images.html" class="dropdown-item">Images</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <a href="ui-lightbox.html"
                                                                class="dropdown-item">Lightbox</a>
                                                            <a href="ui-modals.html" class="dropdown-item">Modals</a>
                                                            <a href="ui-rangeslider.html" class="dropdown-item">Range
                                                                Slider</a>
                                                            <a href="ui-session-timeout.html"
                                                                class="dropdown-item">Session Timeout</a>
                                                            <a href="ui-progressbars.html"
                                                                class="dropdown-item">Progress Bars</a>
                                                            <a href="ui-sweet-alert.html"
                                                                class="dropdown-item">Sweet-Alert</a>
                                                            <a href="ui-tabs-accordions.html" class="dropdown-item">Tabs
                                                                & Accordions</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <a href="ui-typography.html"
                                                                class="dropdown-item">Typography</a>
                                                            <a href="ui-video.html" class="dropdown-item">Video</a>
                                                            <a href="ui-general.html" class="dropdown-item">General</a>
                                                            <a href="ui-colors.html" class="dropdown-item">Colors</a>
                                                            <a href="ui-rating.html" class="dropdown-item">Rating</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Apps <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                                <a href="calendar.html" class="dropdown-item">Calendar</a>
                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                        id="topnav-email" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Email <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-email">
                                                        <a href="email-inbox.html" class="dropdown-item">Inbox</a>
                                                        <a href="email-read.html" class="dropdown-item">Read Email</a>
                                                    </div>
                                                </div>

                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                        id="topnav-task" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Tasks <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-task">
                                                        <a href="tasks-list.html" class="dropdown-item">Task List</a>
                                                        <a href="tasks-kanban.html" class="dropdown-item">Kanban
                                                            Board</a>
                                                        <a href="tasks-create.html" class="dropdown-item">Create
                                                            Task</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-charts"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Components <div class="arrow-down"></div>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="topnav-charts">
                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                        id="topnav-form" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Forms <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-form">
                                                        <a href="form-elements.html" class="dropdown-item">Form
                                                            Elements</a>
                                                        <a href="form-validation.html" class="dropdown-item">Form
                                                            Validation</a>
                                                        <a href="form-advanced.html" class="dropdown-item">Form
                                                            Advanced</a>
                                                        <a href="form-editors.html" class="dropdown-item">Form
                                                            Editors</a>
                                                        <a href="form-uploads.html" class="dropdown-item">Form File
                                                            Upload</a>
                                                        <a href="form-xeditable.html" class="dropdown-item">Form
                                                            Xeditable</a>
                                                        <a href="form-repeater.html" class="dropdown-item">Form
                                                            Repeater</a>
                                                        <a href="form-wizard.html" class="dropdown-item">Form Wizard</a>
                                                        <a href="form-mask.html" class="dropdown-item">Form Mask</a>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                        id="topnav-table" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Tables <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-table">
                                                        <a href="tables-basic.html" class="dropdown-item">Basic
                                                            Tables</a>
                                                        <a href="tables-datatable.html" class="dropdown-item">Data
                                                            Tables</a>
                                                        <a href="tables-responsive.html"
                                                            class="dropdown-item">Responsive Table</a>
                                                        <a href="tables-editable.html" class="dropdown-item">Editable
                                                            Table</a>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                        id="topnav-table" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Charts <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-table">
                                                        <a href="charts-apex.html" class="dropdown-item">Apex charts</a>
                                                        <a href="charts-chartjs.html" class="dropdown-item">Chartjs
                                                            Chart</a>
                                                        <a href="charts-flot.html" class="dropdown-item">Flot Chart</a>
                                                        <a href="charts-knob.html" class="dropdown-item">Jquery Knob
                                                            Chart</a>
                                                        <a href="charts-sparkline.html" class="dropdown-item">Sparkline
                                                            Chart</a>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                        id="topnav-table" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Icons <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-table">
                                                        <a href="icons-boxicons.html" class="dropdown-item">Boxicons</a>
                                                        <a href="icons-materialdesign.html"
                                                            class="dropdown-item">Material Design</a>
                                                        <a href="icons-dripicons.html"
                                                            class="dropdown-item">Dripicons</a>
                                                        <a href="icons-fontawesome.html" class="dropdown-item">Font
                                                            awesome</a>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                        id="topnav-map" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Maps <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-map">
                                                        <a href="maps-google.html" class="dropdown-item">Google Maps</a>
                                                        <a href="maps-vector.html" class="dropdown-item">Vector Maps</a>
                                                    </div>
                                                </div>

                                                <div class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                                        id="topnav-layouts" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Layouts <div class="arrow-down"></div>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="topnav-layouts">
                                                        <a href="layouts-vertical.html"
                                                            class="dropdown-item">Vertical</a>
                                                        <a href="layouts-preloader.html"
                                                            class="dropdown-item">Preloader</a>
                                                        <a href="layouts-boxed.html" class="dropdown-item">Boxed</a>
                                                        <a href="layouts-topbar-light.html" class="dropdown-item">Topbar
                                                            Light</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>


                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Points <div class="arrow-down"></div>
                                            </a>

                                            <div class="dropdown-menu px-2 " aria-labelledby="topnav-pages">
                                                <div class="row">
                                                    <div class="col">
                                                        <div>
                                                            <a href="pages-register.html"
                                                                class="dropdown-item">Orders</a>
                                                            <a href="{{ url('/dashboard/point-package') }}"
                                                                class="dropdown-item">Point
                                                                Packages</a>
                                                            <a href="{{ url('/dashboard/point-package/add') }}"
                                                                class="dropdown-item">Add New Package</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                                id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i
                                                        class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect"
                                data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>


                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user"
                                    src="{{ asset('admin-template/assets/images/users/avatar-2.jpg')}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1">Patrick</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i
                                        class="bx bx-user font-size-16 align-middle mr-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i
                                        class="bx bx-wallet font-size-16 align-middle mr-1"></i> My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span
                                        class="badge badge-success float-right">11</span><i
                                        class="bx bx-wrench font-size-16 align-middle mr-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i
                                        class="bx bx-lock-open font-size-16 align-middle mr-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i
                                        class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                                    Logout</a>
                            </div>
                        </div>


                    </div>
                </div>
            </header>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    @yield('content')
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Qovex.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    </div>
    <!-- end container-fluid -->




    <!-- JAVASCRIPT -->
    <script src="{{ asset('/admin-template/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('/admin-template/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('/admin-template/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ asset('/admin-template/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('/admin-template/assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('/admin-template/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- jquery.vectormap map -->
    <script
        src="{{ asset('/admin-template/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}">
    </script>
    <script
        src="{{ asset('/admin-template/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}">
    </script>

    <script src="{{ asset('/admin-template/assets/js/pages/dashboard.init.js')}}"></script>

    <script src="{{ asset('/admin-template/assets/js/app.js')}}"></script>

</body>

</html>
