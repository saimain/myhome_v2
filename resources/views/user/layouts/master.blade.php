<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
                        <a class="nav-link" href="https://www.facebook.com/myhomemyanmar1/" target="_blank"><i
                                class="fab fa-facebook"></i></a>
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
                        <a class="nav-link" href="{{ url('/contact') }}"><i class="fas fa-phone-alt mr-2"></i>
                            Contact</a>
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
                            <a class="nav-link" href="{{ url('/sale/properties') }}"><i class="far fa-file-alt"></i> For
                                Sale</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/rent/properties') }}"><i class="far fa-file-alt"></i> For
                                Rent</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('properties') }}"><i class="fas fa-building"></i>
                                Properties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('agents') }}"><i class="fas fa-user-friends"></i>
                                Agents</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('construction') }}"><i class="fas fa-users-cog"></i>
                        Construction</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('search') }}"><i class="fas fa-search"></i> Search</a>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>


        {{-- Mobile Sidebar --}}
        <div class="wrapper d-md-none">
            <nav id="sidebar">
                <ul class="list-unstyled mt-3">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">For Sale</a></li>
                    <li><a href="#">For Rent</a></li>
                    <li><a href="#">Properties</a></li>
                    <li><a href="#">Agents</a></li>
                    <li><a href="#">Construction</a></li>
                    @auth

                    @else
                    <hr>
                    <li>
                        <div class="px-2">
                            <a href="{{ url('/login') }}" class="btn btn-primary w-100 text-white"><b>Login
                                    Account</b></a>
                        </div>
                    </li>
                    <li class=""><a href="{{ url('/register') }}" class="text-center"><small>Register New
                                Account</small></a>
                    </li>
                    @endauth
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
                        <a class="navbar-brand" href="{{ url('/') }}">
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
                <div class="container py-5 text-white">
                    <div class="row">
                        <div class="col-md-4">
                            <ul style="list-style: none" class="px-0">
                                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                <div class="mt-3"></div>
                                <li><a href="{{ url('/about') }}">What is MyHome MM</a></li>
                                <div class="mt-3"></div>
                                <li><a href="#">Regions in Myanmar</a></li>
                                <div class="mt-3"></div>
                                <li><a href="{{ url('term-of-service') }}">Terms of services</a></li>
                                <div class="mt-3"></div>
                                <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul style="list-style: none" class="px-0">
                                <li><a href="{{ url('guide') }}">User Guide</a></li>
                                <div class="mt-3"></div>
                                <hr>
                                <li>
                                    <form action="#">
                                        <label for="">Get Email for New Property</label>
                                        <input type="email" placeholder="Email Address" class="form-control">
                                        <button class="btn mt-2 btn-primary text-white">Submit</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d217646.76398263453!2d95.9735022828026!3d16.915893949412617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ecc7a5fae025%3A0xefaaaf158bb12780!2sKyaik%20Ka%20San%20Rd%2C%20Yangon!5e0!3m2!1sen!2smm!4v1608400446579!5m2!1sen!2smm"
                                width="" height="200" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    <script src="{{ asset('js/lightGallery/lightgallery.min.js') }}"></script>

    <script src="{{ asset('js/lightslider.js') }}"></script>
    <script src="{{ asset('js/master.js') }}"></script>
    <script src="{{asset('js/image_upload.js')}}"></script>



</body>

</html>
