<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" user-scalable="no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">

    <link type="text/css" rel="stylesheet" href="{{ asset('css/lightGallery/lightgallery.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/lightGallery/lg-transitions.css') }}" />

    @yield('og-field')

</head>

<body class="bg-white">
    @include('sweetalert::alert')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=401842574339732&autoLogAppEvents=1"
        nonce="ymk8N3Ds"></script>

    <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top d-none d-md-block">
        <div class="d-flex justify-content-between">
            <div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span class="nav-link">Follow us:</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-phone-alt mr-2"></i> Contact</a>
                    </li>
                    @auth
                    <li class="nav-item bg-primary ml-3">
                        <a class="nav-link text-white" href="{{ url('my') }}">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                    <li class="nav-item bg-primary ml-3">
                        <a class="nav-link text-white" href="{{ url('login') }}">Login Account</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="">
        <div class="d-none d-md-block mt-5 py-5">
            <div class="container">
                <div class="logo-header">
                    <img src="{{ asset('images/assets/logo/myhome.svg') }}" width="150" alt="">
                </div>
            </div>
        </div>


        {{-- Desktop & Table Navbar --}}
        <div class="d-none d-md-block">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <div class="container">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/')}}"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="far fa-file-alt"></i> For Sale</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="far fa-file-alt"></i> For Rent <i class="fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-building"></i> Properties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user-friends"></i> Agents</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-users-cog"></i> Construction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-search"></i> Search</a>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>


        {{-- Mobile Sidebar --}}
        <div class="wrapper d-md-none">
            <nav id="sidebar">
                <ul class="list-unstyled mt-3">
                    <li class="">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Home</a>

                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="#">Home 1</a>
                            </li>
                            <li>
                                <a href="#">Home 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">About</a></li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">Pages</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Page 1</a></li>
                            <li><a href="#">Page 2</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Policy</a></li>
                </ul>
                @auth
                <form id="logoutForm" action="{{ url('logout') }}" method="POST">
                    @csrf
                </form>
                <hr>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/my') }}">Dashboard</a></li>
                    <li><a href="{{ url('/my/account') }}">My Account</a></li>
                    <li><a href="{{ url('/my/saved') }}">Saved Posts</a></li>
                    <li><a href="{{ url('/my/inbox') }}">Message Inbox</a></li>
                    <li><a href="{{ url('/my/buy-point') }}">Buy Points</a></li>
                    <li><a href="{{ url('/my/upload-property') }}">Upload Property</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logoutForm').submit();">Logout</a></li>
                </ul>
                @endauth
            </nav>



        </div>

        <div id="content">
            <nav class="d-md-none navbar navbar-expand-lg navbar-light bg-light ">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <div>
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('images/assets/logo/myhome.svg') }}" width="100" alt="">
                        </a>
                    </div>
                    <div>
                        <button type="button" id="sidebarCollapse" class="btn mr-auto">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>

            </nav>

            {{-- content --}}
            <div class="">
                @yield('content')
            </div>

            {{-- footer --}}
            <div class="bg-secondary mt-5" style="width: 100%;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, natus! Voluptatum sit
                                aliquam
                                voluptas voluptatibus odit magni impedit reiciendis est! Distinctio ad et provident,
                                alias
                                at
                                placeat quis iure commodi.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, natus! Voluptatum sit
                                aliquam
                                voluptas voluptatibus odit magni impedit reiciendis est! Distinctio ad et provident,
                                alias
                                at
                                placeat quis iure commodi.
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, natus! Voluptatum sit
                                aliquam
                                voluptas voluptatibus odit magni impedit reiciendis est! Distinctio ad et provident,
                                alias
                                at
                                placeat quis iure commodi.
                            </p>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            <p class=" text-white">All Right Reserved , Copyright &copy; My Home Myanmar 2020 &reg;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>






    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    <script src="{{ asset('js/lightGallery/lightgallery.min.js') }}"></script>

    <script src="{{ asset('js/lightslider.js') }}"></script>
    <script src="{{ asset('js/master.js') }}"></script>
    <script src="{{asset('js/image_upload.js')}}"></script>



</body>

</html>
