<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('vendor/metrica/dist/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/metrica/dist/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/metrica/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/metrica/dist/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Scripts -->

        <script src="{{ asset('build/assets/app-9mbrzSRH.js') }}"></script>

        <style>
            body[data-layout=horizontal].dark-topbar .navbar-custom, body[data-layout=horizontal].dark-topbar .topbar {
                background-color: #41cbd8;
            }
            body[data-layout=horizontal].dark-topbar .navbar-custom .brand, body[data-layout=horizontal].dark-topbar .topbar .brand {
                background-color: #41cbd8;
            }
            body[data-layout=horizontal] .topbar .brand {
                width: 350px!important;
                text-align: left;
                margin-left: 5px;
            }
            @keyframes blink {
                0% { opacity: 1; }
                50% { opacity: 0; }
                100% { opacity: 1; }
            }

            .blinking-text {
                animation: blink 1s infinite;
            }
        </style>
    </head>
    {{-- <body data-layout="horizontal" class="">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body> --}}

    <body data-layout="horizontal" class="dark-topbar">
        <!-- Top Bar Start -->
        <div class="topbar shadow">
            <!-- LOGO -->
            <div class="brand">
                <a href="{{ route('index') }}" class="logo fs-4 fw-bold">
                    <span>
                        <img src="{{ asset('img/puskesmas.png') }}" alt="logo-small" style="height: 45px;">
                    </span>
                    Puskesmas 9 Nopember
                </a>
            </div>
            <!--end logo-->
            <!-- Navbar -->

            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-end mb-0">
                    @if (auth()->user() && !Route::is('monitoring'))
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/avatar.png') }}" alt="profile-user" class="rounded-circle me-0 me-md-2 thumb-sm" />
                                <div class="user-namex">
                                    <small class="d-block fw-semibold fs-5 fw-bold text-dark">Admin</small>
                                    {{-- <span class=" fw-semibold font-12">Maria Gibson <i
                                            class="mdi mdi-chevron-down"></i></span> --}}
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('dashboard') }}"><i class="ti ti-user font-16 me-1 align-text-bottom"></i> Dashboard</a>
                            {{-- <a class="dropdown-item" href="#"><i class="ti ti-settings font-16 me-1 align-text-bottom"></i> Settings</a> --}}
                            <div class="dropdown-divider mb-0"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();
                            this.closest('form').submit();"><i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
                            </form>
                        </div>
                    </li><!--end topbar-profile-->
                    @endif

                </ul><!--end topbar-nav-->

                <div class="navbar-custom-menu">
                    <div id="navigation">
                    </div> <!-- end navigation -->
                </div>
                <!-- Navbar -->
            </nav>
            <!-- end navbar-->

        </div>
        <!-- Top Bar End -->



        <!-- end leftbar-tab-menu-->

        <div class="page-wrapper">
            <!-- Page Content-->
            <div class="page-content-tab">
                <div class="container-fluid" style="height: 90%;">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col align-self-center">
                                        {{-- <h4 class="page-title pb-md-0">Starer</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dastone</a></li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Starer</li>
                                        </ol> --}}
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                        <a href="#" class="fs-5 fw-semibold" id="Dash_Date">
                                            <div>{{ $today }}&nbsp;
                                            <span id="liveClock" class="clock"></span></div>
                                        </a>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->

                    {{ $slot }}

                </div><!-- container -->
            </div>
            <!-- end page content -->
        </div>

        <!--Start Footer-->
        <!-- Footer Start -->
        <footer class="footer text-center">
            &copy; <span class="text-muted d-none d-sm-inline-block">Polanka NadiaIntania. Some Right Reserved</span>
        </footer>
        <!-- end Footer -->
        <!--end footer-->

        <!-- Javascript  -->
        <!-- vendor js -->

        <span id="serverTime" style="display: none">{{
            $todayWithTime
        }}</span>

        <script src="{{ asset('vendor/metrica/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/metrica/dist/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('vendor/metrica/dist/assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('vendor/metrica/dist/assets/js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('vendor/metrica/dist/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            function pad(value) {
                return value < 10 ? "0" + value : value;
            }

            function showTime() {
                var serverTime2 = document.getElementById("serverTime").innerText;
                var date = new Date(serverTime);

                var serverTime = new Date(serverTime2);

                console.log(serverTime);

                function updateClock() {
                    serverTime.setSeconds(serverTime.getSeconds() + 1);

                    var hours = pad(serverTime.getHours());
                    var minutes = pad(serverTime.getMinutes());
                    var seconds = pad(serverTime.getSeconds());

                    var time = hours + ":" + minutes + ":" + seconds;
                    document.getElementById("liveClock").innerText = time;

                    setTimeout(updateClock, 1000);
                }

                updateClock();
            }

            showTime();
        </script>

        @if (isset($script))
            {{ $script }}
        @endif
    </body>
</html>
