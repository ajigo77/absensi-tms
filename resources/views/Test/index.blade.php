<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#e1f0ff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Beranda</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
    {{-- Component link style --}}
    <x-src.link-style></x-src.link-style>
    <style>
        body.shimeji-pinned iframe {
            pointer-events: none;
        }

        body.shimeji-select-ie {
            cursor: cell !important;
        }

        #shimeji-contextMenu::-webkit-scrollbar {
            width: 6px;
        }

        #shimeji-contextMenu::-webkit-scrollbar-thumb {
            background-color: rgba(30, 30, 30, 0.6);
            border-radius: 3px;
        }

        #shimeji-contextMenu::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .flex-wrap .icon {
            transition: .3s;
        }

        .flex-wrap .icon:hover {
            color: rgba(0, 0, 0, 0.6);
        }
    </style>
    <meta name="shimejiBrowserExtensionId" content="gohjpllcolmccldfdggmamodembldgpc" data-version="2.0.5">
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <!-- Preloader-->

    <!-- Header Area-->
    <div class="header-area" id="headerArea">
        <div class="container h-100 d-flex align-items-center justify-content-between">
            <!-- Logo Wrapper-->
            <div class="logo-wrapper">
                <a href="{{ route('hero') }}" class="text-decoration-none text-dark fw-bold">
                    <img src="{{ asset('logo-company/tms.png') }}" alt="" width="40" height="40">
                    <span class="fs-6 fw-semibold">PT. Tecnology Multi System</span>
                </a>
            </div>
            <!-- Search Form-->
            {{-- <div class="top-search-form">
          <form action="" method="">
            <input class="form-control" type="search" placeholder="Enter your keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div> --}}

            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler">
                <i class="bi bi-list fs-3 icon"></i>
            </div>
        </div>
    </div>
    {{-- Component sidebar --}}
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <div class="suha-sidenav-wrapper" id="sidenavWrapper">
        <!-- Sidenav Profile-->
        <div class="sidenav-profile">
            <div class="user-profile">
                <img src="{{ asset('image/src/avatar-profile.png') }}" width="80" height="auto" alt="Logo">
            </div>
            <div class="user-info">
                <h6 class="user-name mb-0 text-secondary">ID User : {{ Auth::user()->id_user }}</h6>
                <p class="text-secondary user-name">{{ Auth::user()->Member->nama }}</p>
            </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
            <li>
                <a href="{{ route('hero') }}">
                    <i class="bi bi-house text-danger"></i>Beranda
                </a>
            </li>
            <li>
                <a href="{{ route('index') }}">
                    <i class="bi bi-houses text-danger"></i>Halaman Utama
                </a>
            </li>
            <li>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <i class="lni lni-power-switch text-danger" style="margin-right: 0.5rem"></i>
                        Keluar
                    </button>
                </form>
            </li>
        </ul>
        <!-- Go Back Button-->
        <div class="go-home-btn" id="goHomeBtn">
            <i class="bi bi-layout-sidebar"></i>
            </i>
        </div>
    </div>

    <!-- PWA Install Alert-->
    {{-- <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true"
        data-bs-delay="5000" data-bs-autohide="true">
        <div class="toast-body">
            <div class="content d-flex align-items-center mb-2"><img
                    src="https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/icons/icon-72x72.png"
                    alt="">
                <h6 class="mb-0">Selamat Datang Kembali...</h6>
                <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
            </div><span class="mb-0 d-block">Silahkan pilih menu tersedia untuk melihat dan mengelola konten</span>
        </div>
    </div> --}}
    <div class="page-content-wrapper">
        <div class="container">
            <div class="pt-3">
                <!-- Hero Slides-->
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('image/src/slide-1.jpeg') }}" class="d-block w-full h-full" alt="..." height="300" style="border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/src/slide-2.png') }}" class="d-block w-full h-full" alt="..." height="300" style="border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/src/slide-3.jpeg') }}" class="d-block w-full h-full" alt="..." height="300" style="border-radius:10px;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" style="background: transparent; outline: none; border:none; color:red;" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="background: transparent; outline: none; border:none; color:red;" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Product Catagories-->
        <div class="product-catagories-wrapper py-4">
            <div class="container">
                <div class="section-heading">
                    <h6>Menu</h6>
                </div>
                <div class="product-catagory-wrap">
                    <div class="row g-3">
                        <!-- Single Catagory Card-->
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body">
                                    <a class="text-danger" href="{{ route('absen') }}">
                                        <i class="bi bi-calendar-check text-primary"></i>
                                        <span>Absensi</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Catagory Card-->
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body">
                                    <a href="{{ route('notif.cuti') }}">
                                        <i class="bi bi-file-earmark-check"></i>
                                        <span>Cuti</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Catagory Card-->
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body">
                                    <a class="text-warning" href="{{ route('notif.izin') }}">
                                        <i class="bi bi-file-earmark-check-fill text-success"></i>
                                        <span>Izin</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Catagory Card-->
                        @if(Auth::user()->jabatan_id == 15 || Auth::user()->jabatan_id == 21)
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body">
                                    <a class="text-success" href="{{ route('filament.admin.pages.dashboard') }}">
                                        <i class="bi bi-speedometer text-warning"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Component link script --}}
    <x-src.link-script></x-src.link-script>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <x-comp-test.footer></x-comp-test.footer>
</body>

</html>
